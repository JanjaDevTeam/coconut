<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');


$idProjeto = $_GET['id'];
if(isset($_GET['box'])) {
	$data['box'] = $_GET['box'];
}
if(isset($_GET['erro'])) {
	switch($_GET['erro']) {
		case 0:
			$data['erro'] = "A colaboração já foi vendida e não pode ser deletada.";
	}
}

$db = new Database;
$proj  = $db->getProjeto($idProjeto);
$colab = $db->getColaboracaoByProjeto($idProjeto);

$data['selecionado'] = 'enviar';
$data['nomeProjeto'] = $proj->getNome();
$data['colaboracao'] = $colab;

Janja::loadTemplate('main', 'projeto/colaboracao', $data);
?>
