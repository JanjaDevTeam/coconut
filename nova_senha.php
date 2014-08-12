<?php
require_once('lib/janja.php');
require_once('controller/controller_login.php');
session_start();
$data['selecionado'] = 'logar';
$ct = new ControllerLogin;

if (isset($_GET['t'])) {
	$ct->redefinirSenha($_GET['t']);
}

if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$redefinir = $ct->tokenSenha($email);

	if ($redefinir == true) {
		Janja::loadTemplate('main', 'user/redefinir_enviado', $data);
	}else {
		Janja::loadTemplate('main', 'user/email_nao_existe', $data);
	}
} else {
	Janja::loadTemplate('main', 'user/nova_senha', $data);
}
?>
