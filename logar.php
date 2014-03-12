<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/user.php');



if(isset($_GET['code'])) {
	require_once('lib/fbconfig.php');
	if(isset($user)) {
		$_SESSION['fb']['fbid'] = $fbid;
		$_SESSION['fb']['fbuname'] = $fbuname;
		$_SESSION['fb']['fbfullname'] = $fbfullname;
		$_SESSION['fb']['fbemail'] = $fbemail;
		$_SESSION['fb']['user'] = $user;
		$_SESSION['logado'] = False;
		
		
		$db = new Database();
		$user = $db->getUserByFbEmail($fbemail);
		if(!is_object($user)) {
			# encaminha para completar o cadastro
			header('location: completar_cadastro.php');
			
		} else {
			$_SESSION['logado'] = True;
			Header('Location: index.php');
		}
		
	}
}

$data['selecionado'] = 'logar';

//Janja::loadTemplate('main', 'logar', $data);
Janja::loadTemplate('main', 'logar', $data);
?>
