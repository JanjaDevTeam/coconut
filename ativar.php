<?php
require_once('lib/janja.php');
require_once('controller/controller_login.php');

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
			// pede a senha e ativa o cadastro.
			print "Passaram $segundos segundos desde o cadastro";
		} else {
			// prazo encerrado, apaga token e usuario
		}
	}
}

?>