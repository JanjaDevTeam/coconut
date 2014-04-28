<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');


$idProjeto = $_GET['id'];

$db = new Database;
$proj  = $db->getProjeto($idProjeto);
$colab = $db->getColaboracaoByProjeto($idProjeto);

$data['selecionado'] = 'enviar';
$data['nomeProjeto'] = $proj->getNome();
$data['colaboracao'] = $colab;

Janja::loadTemplate('main', 'projeto/colaboracao', $data);
?>
