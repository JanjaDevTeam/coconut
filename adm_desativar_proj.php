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

if (isset($_POST['id'])) {
	$idProjeto = $_POST['id'];
	$proj = $db->getProjeto($idProjeto);
	if ($proj->getAtivo() == 1) {
		$proj = $db->toggleAtivo($proj);
	}
	if ($proj->getAnalise() == 0) {
		$proj = $db->toggleAnalise($proj);
	}

 	header("location: adm_projetos_abertos.php");
}

$data['menuAtivo'] = 2;
$nome = explode(" ", $_SESSION['user']['fbfullname']);
$data['username'] = $nome[0];


if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$proj = $db->getProjeto($id);
	$data['nome'] = $proj->getNome();
	$data['id'] = $id;

	$lista = $db->getAbertosList();
	$data['qtdAbertos'] = sizeof($lista);
	$lista = $db->getAtivosList();
	$data['qtdAtivos'] = sizeof($lista);
	Janja::loadTemplate('admin', 'admin/desativar_proj', $data);
}
?>