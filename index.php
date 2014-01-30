<?php
require_once('lib/janja.php');

$data['selecionado'] = 'registrar';

Janja::loadTemplate('main', 'index', $data);
?>
