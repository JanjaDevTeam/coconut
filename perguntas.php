<?php
require_once('lib/janja.php');
require_once('model/database.php');
session_start();

$db = new Database;
$data['categoria'] = $db->getCategoria();
$data['selecionado'] = '';

Janja::loadTemplate('main', 'projeto/perguntas', $data);
?>
