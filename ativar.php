<?php
require_once('lib/janja.php');
require_once('controller/controller_login.php');
require_once('model/database.php');
require_once('model/user.php');

if (!isset($_GET['t'])) {
	// redireciona para index
	header("location: index.php");
} else {
	$ct = new ControllerLogin;
	$token = $_GET['t'];

	// verifica se o token existe
	$tokenArray = $ct->getToken($token);
	
	// caso exista, conta quantos segundos passaram desde o registro
	if (sizeof($tokenArray) == 1) {
		$reg = $tokenArray[0]['dataRegistro'];
		$now = $ct->getNow();
		$segundos = strtotime($now) - strtotime($reg);

		// passou 24 horas?
		if ($segundos < 86400) {
			// ativa o cadastro
			$db = new Database;
			$user = $db->getUser($tokenArray[0]['idUser']);
			$user->setAtivo(1);
			$user = $db->saveUser($user);

			// apaga token
			$db->delToken($tokenArray[0]['token']);

			$data['selecionado'] = "";

			$nameArray = explode(" ", $user->getFullname());
			$data['nome'] = $nameArray[0]; 


			Janja::loadTemplate('main', 'user/ativo', $data);
		} else {
			// prazo encerrado, apaga token e usuario
			$db = new Database;
			$db->delToken($tokenArray[0]['token']);
			Janja::loadTemplate('main', 'user/token_inexistente', $data);
		}
	} else {
		// token não existe
		Janja::loadTemplate('main', 'user/token_inexistente', $data);

	}
}

?>