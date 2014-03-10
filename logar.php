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
		$_SESSION['logado'] = True;
		
		
		$db = new Database();
		$user = $db->getUserByFbEmail($fbemail);
		if(!is_object($user)) {
			$fbuser = $user;
			
			$user = new User();
			$user->setNome($fbfullname);
			$user->setEmail($fbemail);
			$user->setFbuser($_SESSION['fb']['user']);
			$user->setLevel(1);
			
			$user = $db->saveUser($user);
			
		} else {
			// user é objeto usuário
			$fbuser = $user->getFbuser();
			if ($fbuser == '') {
				$user->setFbuser($_SESSION['fb']['user']);
				$user = $db->saveUser($user);
			}
		
		}
		
		Header('Location: index.php');
		
		
	}
}

$data['selecionado'] = 'logar';

//Janja::loadTemplate('main', 'logar', $data);
Janja::loadTemplate('main', 'logar', $data);
?>
