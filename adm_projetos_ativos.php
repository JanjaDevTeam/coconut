<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');

session_start();


$db     = new Database;
$vip = $db->getVipList();

if(!isset($_SESSION['user']) || !in_array($_SESSION['user']['fbemail'], $vip)) {
	header('HTTP/1.0 403 Forbidden');
	echo "<h4>Forbidden<h4>";
	exit;
}


$data['menuAtivo'] = 2;
$nome = explode(" ", $_SESSION['user']['fbfullname']);
$data['username'] = $nome[0];

$data['projetos'] = $db->getAtivosList();
$data['qtdAtivos'] = sizeof($data['projetos']);

Janja::loadTemplate('admin', 'admin/projetos_ativos', $data);
?>