<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');

$idProjeto = $_GET['id'];

$db = new Database;
$proj = $db->getProjeto($idProjeto);
$proj = $db->toggleAnalise($proj);
// modo análise

?>