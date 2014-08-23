<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');

session_start();


$db     = new Database;
$vip = $db->getVipList();

if(!isset($_SESSION['email']) || !in_array($_SESSION['email'], $vip)) {
	header('HTTP/1.0 403 Forbidden');
	echo "<h4>Forbidden<h4>";
	exit;
}


$data['menuAtivo'] = 1;
$nome = explode(" ", $_SESSION['userName']);
$data['username'] = $nome[0];

$data['projetos'] = $db->getAbertosList();
$data['qtdAbertos'] = sizeof($data['projetos']);

Janja::loadTemplate('admin', 'admin/projetos_abertos', $data);
?>