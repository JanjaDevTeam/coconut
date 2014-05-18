<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('controller/controller_projeto.php');

session_start();

if (isset($_POST['nome'])) {
	$proj = new Projeto;

	$proj->setIdUser(1);
	$proj->setNome($_POST['nome']);
	$proj->setIdCategoria($_POST['categoria']);
	$proj->setDescricao($_POST['descricao']);
	$proj->setFrase($_POST['frase']);
	$proj->setIdCategoria($_POST['categoria']);
	$proj->setValor($_POST['valor']);
	$proj->setPrazo($_POST['prazo']);
	$proj->setVideo($_POST['video']);
	$proj->setLinks($_POST['links']);
	$proj->setAtivo(0); // precisa passar por aprovação para ativar
	$proj->setAnalise(0);

	// manda pro controlador fazer a validação
	$ctr = new ControllerProjeto;
	$val = $ctr->validarProjeto($proj);
	if ($val === True) {
		$db = new Database;
		$proj = $db->saveProjeto($proj);
		$id = $proj->getId();
		header("Location: projeto.php?id=$id");
	} else {
		$data['erros']       = 1; // aviso para preencher corretamente
		$data['nome']        = $proj->getNome();
		$data['descricao']   = $proj->getDescricao();
		$data['idCategoria'] = $proj->getIdCategoria();
		$data['frase']       = $proj->getFrase();
		$data['valor']       = $proj->getValor();
		$data['prazo']       = $proj->getPrazo();
		$data['video']       = $proj->getVideo();
		$data['links']       = $proj->getLinks();
	}
	
	
	
}

if(!isset($data['erros'])) { $data['erros'] = 0;}
if (!isset($data['idCategoria'])) { $data['idCategoria'] = 1;}
if (!isset($data['nome'])) { $data['nome'] = "";}
if (!isset($data['descricao'])) { $data['descricao'] = "";}
if (!isset($data['frase'])) { $data['frase'] = "";}
if (!isset($data['valor'])) { $data['valor'] = "";}
if (!isset($data['prazo'])) { $data['prazo'] = "";}
if (!isset($data['video'])) { $data['video'] = "";}
if (!isset($data['links'])) { $data['links'] = "";}
$db = new Database;
$data['categoria'] = $db->getCategoria();
$data['selecionado'] = 'enviar';

Janja::loadTemplate('main', 'projeto/perguntas', $data);
?>
