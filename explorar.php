<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
session_start();

$db = new Database;
$proj = $db->getProjeto(1);
$data['teste']['titulo']     = $proj->getNome();
$data['teste']['img']        = $proj->getImage();
$data['teste']['descricao']  = substr($proj->getDescricao(),0,250).'...';
$data['teste']['pct']        = $proj->getPorcentagem();
$data['teste']['arrecadado'] = $proj->getValorArrecadado();
$data['teste']['dias']       = $proj->getDiasRestantes();


$data['selecionado'] = 'explorar';

Janja::loadTemplate('main', 'index_grid', $data);
?>
