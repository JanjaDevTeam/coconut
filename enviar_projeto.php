<?php
require_once('lib/janja.php');
session_start();

$data['selecionado'] = 'enviar';

Janja::loadTemplate('main', 'index', $data);
?>
