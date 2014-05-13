<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');

$db        = new Database;

$idColab = $_GET['id'];

if(isset($_GET['action']) && $_GET['action'] == 1) {
	// exclui
	$colab     = $db->getColaboracao($idColab);
	$idProjeto = $colab->getIdProjeto();
	$erro = $db->delColaboracao($colab);
	Janja::Debug($erro);
	if (sizeof($erro) == 0) {
		Header("Location: colaboracao.php?id=$idProjeto&box=1");
	}else {
		Header("Location: colaboracao.php?id=$idProjeto&erro=0");
	}
}

$colab     = $db->getColaboracao($idColab);
$idProjeto = $colab->getIdProjeto();
$proj      = $db->getProjeto($idProjeto);

$data['selecionado'] = 'enviar';
$data['nomeProjeto'] = $proj->getNome();
$data['valor']       = $colab->getValor();
$data['descricao']   = $colab->getDescricao();
$data['qtdTotal']    = $colab->getQtdTotal();
$data['idProjeto']   = $colab->getIdProjeto();
$data['idColab']     = $idColab;


Janja::loadTemplate('main', 'projeto/excluir_colab', $data);
?>
