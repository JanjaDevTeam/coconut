<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/user.php');
require_once('controller/controller_login.php');


if(isset($_GET['code'])) {
	require_once('lib/fbconfig.php');
	$controller = new ControllerLogin;
	if(isset($fbuser)) {
		$controller->loginFb($fbemail, $fbfullname, $fbid);
		header('location: index.php');
		
	}
}

$data['selecionado'] = 'logar';

//Janja::loadTemplate('main', 'logar', $data);
Janja::loadTemplate('main', 'logar', $data);
?>
