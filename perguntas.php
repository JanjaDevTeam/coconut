<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
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
	$proj->setAtivo(1);
	
	$db = new Database;
	$db->saveProjeto($proj);
	Janja::Debug($proj); exit;
	
	
}

$db = new Database;
$data['categoria'] = $db->getCategoria();
$data['selecionado'] = 'enviar';

Janja::loadTemplate('main', 'projeto/perguntas', $data);
?>
