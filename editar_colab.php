<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');


$idColab = $_GET['id'];

$db = new Database;
$colab = $db->getColaboracao($idColab);
$idProjeto = $colab->getIdProjeto();
$proj = $db->getProjeto($idProjeto);

$data['selecionado'] = 'enviar';
$data['nomeProjeto'] = $proj->getNome();
$data['valor'] = $colab->getValor();
$data['descricao'] = $colab->getDescricao();
$data['qtdTotal'] = $colab->getQtdTotal();


Janja::loadTemplate('main', 'projeto/editar_colab', $data);
?>
