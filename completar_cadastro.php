<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/user.php');
session_start();
$data['selecionado'] = '';

if (isset($_GET['erro'])) {
	$erro = $_GET['erro'];
	switch ($erro) {
	    case 0:
	        $data['erro'] = "As senhas não batem.";
	        break;
    }
}

if (isset($_POST['senha'])) {
	$senha  = trim($_POST['senha']);
	$senha2 = trim($_POST['senha2']);

	if($senha != $senha2) {
		header('location: completar_cadastro.php?erro=0');
	}

	$db = new Database;

	$user = new User;
	$user->setNome($_SESSION['fb']['fbfullname']);
	$user->setEmail($_SESSION['fb']['fbemail']);
	$user->setSenha($senha);
	$user->setLevel(2);
	$user->setFbuser($_SESSION['fb']['user']);

	$user = $db->saveUser($user);

	# envia email de ativação
	$seed = date("F j, Y, g:i a") . $user->getEmail();
	$token = md5($seed);

	$ativacao = $db->setAtivacao($user->getId(), $token, 0);
	
	$texto = "Clique para ativar: http://solucionatica.com.br/ativacao.php
	\n\nE coloque o seguinte codigo: $token
	\n\nEste token vai estar disponivel por 24 horas.";

	echo "<pre>$texto</pre>";
	exit;

}

Janja::loadTemplate('main', 'user/completar_cadastro', $data);
?>