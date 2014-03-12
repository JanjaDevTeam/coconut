<?php
require_once('lib/janja.php');
require_once('model/user.php');
require_once('model/database.php');

$data['selecionado'] = '';

if (isset($_GET['erro'])) {
	$erro = $_GET['erro'];
	switch ($erro) {
	    case 0:
	        $data['erro'] = "Token não encontrado.";
	        break;
    }
}

if (isset($_POST['token'])) {
	$token = $_POST['token'];

	# desbloqueia cadsatro

	$db = new Database;
	$ativacao = $db->getAtivacao($token);

	if (sizeof($ativacao == 0)) { header('location: ativacao.php?erro=0'); }

	Janja::Debug($ativacao);

	$agora = date('Y-m-d H:i:s');
	$data  = $ativacao[0]['data_registro'];
	
	$diff = abs(strtotime($agora) - strtotime($data));

	# 24 horas = 86400 segundos
	if ($diff < 86400) {
		// ativa cadastro: seta ativo=1
		$user = $db->loadUser($ativacao[0]['id_user']);
		$user->setAtivo(1);
		$user = $db->saveUser($user);
		// apaga o token do banco
		$temp = $db->apagaToken($ativacao[0]['id']);
		header('location: bemvindo.php');
	}
}

Janja::loadTemplate('main', 'user/ativacao', $data);

?>