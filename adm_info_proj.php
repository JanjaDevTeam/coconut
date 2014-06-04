<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('controller/controller_projeto.php');

session_start();


$db     = new Database;
$vip = $db->getVipList();

if(!isset($_SESSION['user']) || !in_array($_SESSION['user']['fbemail'], $vip)) {
	header('HTTP/1.0 403 Forbidden');
	echo "<h4>Forbidden<h4>";
	exit;
}


$data = "";

$id = $_GET['id'];

$proj = $db->getProjeto($id);

$data['id'] = $id;
$data['nome'] = $proj->getNome();
$data['categoria'] = $proj->getCategoria();
$owner = $db->getOwnerInfo($id);
$data['owner'] = $owner['fbfullname'];
$data['email'] = $owner['fbemail'];
$data['ativo'] = ($proj->getAtivo() == 0) ? "Inativo" : "Ativo";
$data['analise'] = ($proj->getAnalise() == 0) ? "Não enviado" : "Em análise";
$data['projAnalise'] = $proj->getAnalise();
$data['projAtivo'] = $proj->getAtivo();




$ct = new ControllerProjeto;
$projArray = $ct->getProjetoCompleto($id);
$data['diasRestantes']   = $projArray['diasRestantes'];
$data['prazo']           = $projArray['prazo'];
$data['pct']             = $projArray['pct'];



$lista = $db->getAbertosList();
$data['qtdAbertos'] = sizeof($lista);
$lista = $db->getAtivosList();
$data['qtdAtivos'] = sizeof($lista);
Janja::loadTemplate('admin', 'admin/info_proj', $data);
?>