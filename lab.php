<?php
require_once('model/database.php');
require_once('model/projeto.php');
require_once('lib/janja.php');

$db = new Database;
$proj = $db->getProjeto(2);
Janja::Debug($proj);
?>
