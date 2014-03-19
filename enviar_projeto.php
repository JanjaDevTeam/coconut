<?php
require_once('lib/janja.php');
session_start();

$data['selecionado'] = 'enviar';

Janja::loadTemplate('main', 'projeto/enviar_projeto', $data);
?>
