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
	$data['colaboracao']     = $projArray['projeto']->getColaboracao();
	$data['idProponente']    = $projArray['idProponente'];
	$data['proponente']      = $projArray['proponente'];
	$data['pct']             = $projArray['pct'];
	$data['categoria']       = $projArray['categoria'];
	$data['ativo']           = $projArray['projeto']->getAtivo();
	$data['analise']         = $projArray['projeto']->getAnalise();
	$data['id']              = $projArray['projeto']->getId();
	$data['foto']            = $projArray['foto'];

	$data['temColab'] = sizeof($data['colaboracao']) > 0 ? 1 : 0;
}

$data['selecionado'] = 'enviar';

Janja::loadTemplate('main', 'projeto/projeto', $data);
?>
