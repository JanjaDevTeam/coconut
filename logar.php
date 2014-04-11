<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/user.php');



if(isset($_GET['code'])) {
	require_once('lib/fbconfig.php');
	if(isset($fbuser)) {
		$_SESSION['user']['id'] = NULL;
		$_SESSION['user']['ativo'] = NULL;
		$_SESSION['user']['dataRegistro'] = NULL;
		$_SESSION['user']['setDataAcesso'] = NULL;

		$_SESSION['user']['fbid']       = $fbid;
		$_SESSION['user']['fbuname']    = $fbuname;
		$_SESSION['user']['fbfullname'] = $fbfullname;
		$_SESSION['user']['fbemail']    = $fbemail;		
		
		$db = new Database();

		$user = $db->getUserByFbEmail($fbemail);

		$agora = date("Y-m-d H:i:s");

		if (!is_object($user)) {
			// primeira vez que acessa o site, guarda os dados
			$user = new User;
			$user->setFbid($fbid);
			$user->setFbuname($fbuname);
			$user->setFbfullname($fbfullname);
			$user->setFbemail($fbemail);
			$user->setAtivo(1);
			
			$user->setDataRegistro($agora);
			$user->setDataAcesso($agora);

			$user = $db->saveUser($user);
			$url = "https://graph.facebook.com/" .  $_SESSION['user']['fbid']. "/picture";
			$img = "img/userpics/" . $user->getId() . ".jpg";
			copy($url, $img);
		}else {
			$id    = $user->getId();
			$ativo = $user->getAtivo();
			$dataRegistro = $user->getDataRegistro();
			$dataAcesso   = $agora;
			$user->setDataAcesso($agora);
			

			$_SESSION['user']['id'] = $id;
			$_SESSION['user']['ativo'] = $ativo;
			$_SESSION['user']['dataRegistro'] = $dataRegistro;
			$_SESSION['user']['setDataAcesso'] = $agora;

			$user = $db->saveUser($user);
			
			$url = "https://graph.facebook.com/" .  $_SESSION['user']['fbid']. "/picture?type=large";
			$img = "img/userpics/" . $user->getId() . ".jpg";
			copy($url, $img);

			// $carteiro->boasVindas($user);

		}
		header('location: index.php');
		
	}
}

$data['selecionado'] = 'logar';

//Janja::loadTemplate('main', 'logar', $data);
Janja::loadTemplate('main', 'logar', $data);
?>
