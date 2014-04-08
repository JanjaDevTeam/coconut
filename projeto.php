<?php
require_once('lib/janja.php');
require_once('controller/controller_projeto.php');
session_start();

if (!isset($_GET['id'])) {
	header("Location: index.php");
} else {
	$id = $_GET['id'];
	$ct = new ControllerProjeto;
	$projArray = $ct->getProjetoCompleto($id);
	
	$data['nome']            = $projArray['projeto']->getNome();
	$data['descricao']       = $projArray['projeto']->getDescricao();
	$data['backers']         = $projArray['backers'];
	$data['valorArrecadado'] = $projArray['projeto']->getValorArrecadado();
	$data['diasRestantes']   = $projArray['diasRestantes'];
	$data['valor']           = $projArray['projeto']->getValor();
	$data['videoId']         = $projArray['videoId'];
}


$data['selecionado'] = '';

Janja::loadTemplate('main', 'projeto/projeto', $data);
?>
