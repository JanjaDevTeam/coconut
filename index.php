<?php
require_once('lib/janja.php');
session_start();
$data['selecionado'] = '';

if (isset($_GET['msg']) && $_GET['msg'] == "u") {
	$data['msg'] = "u";
}else {
	$data['msg'] = "";
}
Janja::loadTemplate('main', 'index', $data);
?>
