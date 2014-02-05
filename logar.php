<?php
require_once('lib/janja.php');

$data['selecionado'] = 'logar';

//Janja::loadTemplate('main', 'logar', $data);
Janja::loadTemplate('main', 'index', $data);
?>
