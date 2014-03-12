<?php
require_once('lib/janja.php');
session_start();
$data['selecionado'] = '';

Janja::loadTemplate('main', 'perfil', $data);
?>
