<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/user.php');
require_once('controller/controller_login.php');

session_start();
$data['selecionado'] = 'logar';
$ct = new ControllerLogin;

// caso receba um token
if (isset($_GET['t'])) {
	$token = $_GET['t'];
	$tokenArray = $ct->getToken($token);
	// caso o token exista
	if (sizeof($tokenArray) == 1) {
		$reg = $tokenArray[0]['dataRegistro'];
		$now = $ct->getNow();
		$segundos = strtotime($now) - strtotime($reg);

		// passou 24 horas?
		if ($segundos < 86400) {
			$data['token'] = $_GET['t'];
			Janja::loadTemplate('main', 'user/form_senha', $data);
		}else {
			$db = new Database;
			$db->delToken($tokenArray[0]['token']);
			Janja::loadTemplate('main', 'user/token_inexistente', $data);
		}

	// se não existir, dispara aviso.
	} else {
		Janja::loadTemplate('main', 'user/token_inexistente', $data);
	}
}



if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$redefinir = $ct->tokenSenha($email);

	if ($redefinir == true) {
		Janja::loadTemplate('main', 'user/redefinir_enviado', $data);
	}else {
		Janja::loadTemplate('main', 'user/email_nao_existe', $data);
	}
} else if (isset($_POST['senha'])){
	// redefine a senha
	$db = new Database;
	$senha  = $_POST['senha'];
	$senha2 = $_POST['senha2'];
	$token = $_POST['token'];
	$tokenArray = $ct->getToken($token);
	$idUser = $tokenArray[0]['idUser'];
	
	$user = new User;
	$user->setId($idUser);
	$user->setPassword($senha);
	$db->updateSenha($user);
	$db->delToken($tokenArray[0]['token']);

	Janja::loadTemplate('main', 'user/senha_redefinida', $data);

} else {
	Janja::loadTemplate('main', 'user/nova_senha', $data);
}
?>
