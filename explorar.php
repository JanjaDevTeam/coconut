<?php
require_once('lib/janja.php');
session_start();
$data['selecionado'] = 'explorar';

Janja::loadTemplate('main', 'index', $data);
?>
