<?php
require_once('lib/janja.php');
require_once('model/database.php');

session_start();

$db     = new Database;
$vip = $db->getVipList();

if(!isset($_SESSION['email']) || !in_array($_SESSION['email'], $vip)) {
	header('HTTP/1.0 403 Forbidden');
	echo "<h4>Forbidden<h4>";
	exit;
}

$data['menuAtivo'] = 0;
$lista = $db->getAbertosList();
$data['qtdAbertos'] = sizeof($lista);
$lista = $db->getAtivosList();
$data['qtdAtivos'] = sizeof($lista);
$nome = explode(" ", $_SESSION['user']['fbfullname']);
$data['username'] = $nome[0];


Janja::loadTemplate('admin', 'admin/exemplo', $data);
?>