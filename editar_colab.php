<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');

$db = new Database;

if(isset($_POST['valor'])) {
	$valor     = $_POST['valor'];
	$descricao = $_POST['descricao'];
	$qtdTotal  = $_POST['qtdTotal'];
	$id        = $_POST['idColab'];

	$colab = $db->getColaboracao($id);
	$colab->setValor($valor);
	$colab->setDescricao($descricao);
	$colab->setQtdTotal($qtdTotal);

	$colab = $db->saveColaboracao($colab);
	
	$idProjeto = $colab->getIdProjeto();
	Header("Location: colaboracao.php?id=$idProjeto&box=1");

}

if(isset($_GET['id'])) {
	$idColab = $_GET['id'];

	
	$colab = $db->getColaboracao($idColab);
	$idProjeto = $colab->getIdProjeto();
	$proj = $db->getProjeto($idProjeto);
	$data['selecionado'] = 'enviar';
	$data['nomeProjeto'] = $proj->getNome();
	$data['valor']       = $colab->getValor();
	$data['descricao']   = $colab->getDescricao();
	$data['qtdTotal']    = $colab->getQtdTotal();
	$data['idColab']     = $idColab;
	$data['idProjeto']   = $colab->getIdProjeto();


	Janja::loadTemplate('main', 'projeto/editar_colab', $data);
}
?>
