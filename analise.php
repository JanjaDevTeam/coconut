<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');

$idProjeto = $_GET['id'];

$db = new Database;
$proj = $db->getProjeto($idProjeto);
if ($proj->getAnalise() == 0) {
	$proj = $db->toggleAnalise($proj);
}

header("location: projeto.php?id=$idProjeto");
// modo análise

?>