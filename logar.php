<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/user.php');
require_once('controller/controller_login.php');

session_start();

if(isset($_GET['code'])) {
	require_once('lib/fbconfig.php');
	$controller = new ControllerLogin;
	if(isset($fbuser)) {
		$controller->loginFb($fbemail, $fbfullname, $fbid);
	}
}

if(isset($_POST['email']) && isset($_POST['password'])) {

	$controller = new ControllerLogin;
	$controller->LoginAcc($_POST['email'], $_POST['password']);
}

$data['selecionado'] = 'logar';

//Janja::loadTemplate('main', 'logar', $data);
Janja::loadTemplate('main', 'logar', $data);
?>
