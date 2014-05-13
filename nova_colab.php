<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');

$db = new Database;

if(isset($_GET['id'])) {
	$data['idProjeto'] = $_GET['id'];
	$data['nomeProjeto'] = "";
	$data['selecionado'] = "enviar";

	$projeto = $db->getProjeto($data['idProjeto']);
	Janja::loadTemplate('main', 'projeto/nova_colab', $data);
} else
if(isset($_POST)) {
	$valor     = $_POST['valor'];
	$descricao = $_POST['descricao'];
	$qtdTotal  = $_POST['qtdTotal'];
	$idProjeto = $_POST['idProjeto'];

	$colab = new Colaboracao;
	$colab->setValor($valor);
	$colab->setDescricao($descricao);
	$colab->setQtdTotal($qtdTotal);
	$colab->setQtdComprada(0);
	$colab->setIdProjeto($idProjeto);

	$colab = $db->saveColaboracao($colab);
	
	$idProjeto = $colab->getIdProjeto();
	Header("Location: colaboracao.php?id=$idProjeto&box=1");
}


?>
