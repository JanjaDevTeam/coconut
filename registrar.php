<?php
require_once('lib/janja.php');
require_once('controller/controller_login.php');
session_start();
require_once('lib/fbconfig.php');

$data['selecionado'] = "logar";

if(isset($_GET['code'])) {
	require_once('lib/fbconfig.php');
	$controller = new ControllerLogin;
	if(isset($fbuser)) {
		$controller->loginFb($fbemail, $fbfullname, $fbid);
	}
}


if (isset($_POST['fullname'])) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$ct = new ControllerLogin;
	if ($ct->registrar($email, $fullname, $password, $password2) == true) {
		$data['fullname'] = $fullname;
		Janja::loadTemplate('main', 'user/registro_completo', $data);
	}

} else if (isset($_GET['msg'])) {
	if ($_GET['msg'] == "fb") {
		if(isset($loginUrl)) { $data['loginUrl'] = $loginUrl; }
		
		Janja::loadTemplate('main', 'user/fb', $data);
	} else if ($_GET['msg']=="acc") {
		Janja::loadTemplate('main', 'user/acc', $data);
	}

}else {
	Janja::loadTemplate('main', 'user/registrar', $data);
}
?>
