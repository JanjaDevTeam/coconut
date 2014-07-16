<?php
require_once('lib/janja.php');
require_once('controller/controller_login.php');
session_start();
$data['selecionado'] = 'logar';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	
	if ($password != $password2) {
		header("Location: nova_senha.php?erro=snb");
	}
	
	$controller = new ControllerLogin;
	$controller->redefinirSenha($email, $password, $password2);
}

Janja::loadTemplate('main', 'user/nova_senha', $data);
?>
