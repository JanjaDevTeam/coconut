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

if (isset($_POST['id'])) {
	$idProjeto = $_POST['id'];
	$proj = $db->getProjeto($idProjeto);
	if ($proj->getAtivo() == 0) {
		$proj = $db->toggleAtivo($proj);
	}
	if ($proj->getAnalise() == 1) {
		$proj = $db->toggleAnalise($proj);
	}

 	header("location: adm_projetos_ativos.php");
}

$data['menuAtivo'] = 1;
$nome = explode(" ", $_SESSION['userName']);
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

	Janja::loadTemplate('admin', 'admin/ativar_proj', $data);
}
?>