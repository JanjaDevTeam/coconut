<?php
require_once('lib/janja.php');
require_once('model/database.php');

session_start();

//array de emails de acesso
$acesso = array();
$acesso[] = "brunocanongia@gmail.com";
$acesso[] = "bruno@janjadev.com";

/*
if (!isset($_SESSION['user']['fbemail']) || !in_array($_SESSION['user']['fbemail'], $acesso)) {
	header("HTTP/1.0 404 Not Found");
}
*/

if(!in_array($_SESSION['user']['fbemail'], $acesso)) {
	header('HTTP/1.0 403 Forbidden');
	echo "<h4>Forbidden<h4>";
}

$data = "";

Janja::loadTemplate('admin', 'admin/admin', $data);
?>