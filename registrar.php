<?php
require_once('lib/janja.php');
require_once('controller/controller_login.php');
$data['selecionado'] = "logar";

if (isset($_POST['fullname'])) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$ct = new ControllerLogin;
	$ct->registrar($email, $fullname, $password, $password2);

} else {

	Janja::loadTemplate('main', 'user/registrar', $data);
}
?>
