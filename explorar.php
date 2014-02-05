<?php
require_once('lib/janja.php');

$data['selecionado'] = 'explorar';

Janja::loadTemplate('main', 'index', $data);
?>
