<?php
require_once('lib/janja.php');
require_once('model/colaboracao.php');
require_once('model/projeto.php');
require_once('model/database.php');
session_start();


$id = $_GET['id'];

$db = new Database;
$colab = $db->getColaboracao($id);
$idProjeto = $colab->getIdProjeto();
$proj = $db->getProjeto($idProjeto);

$data['projeto']['nome'] = $proj->getNome();
$data['colab']['descricao']  = $colab->getDescricao();
$data['colab']['valor'] = $colab->getValor();
$data['colab']['qtdTotal'] = $colab->getQtdTotal();
$data['colab']['qtdComprada'] = $colab->getQtdComprada();
$data['colab']['id'] = $colab->getId();
$data['selecionado'] = '';



Janja::loadTemplate('main', 'projeto/colaborar', $data);
?>
