<?php
require_once('lib/janja.php');
require_once('model/database.php');
session_start();

if(isset($_POST['nome'])) {
	Janja::Debug($_POST);
}


$db = new Database;
$data['categoria'] = $db->getCategoria();
$data['selecionado'] = '';

Janja::loadTemplate('main', 'projeto/perguntas', $data);
?>
