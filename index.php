<?php
require_once('lib/janja.php');

$data['nome'] = 'Lord Vader';
$data['selecionado'] = 'registrar';

Janja::loadTemplate('main', 'teste', $data);
?>
