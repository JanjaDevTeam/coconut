<?php
require_once('lib/janja.php');

$data['selecionado'] = 'enviar';

Janja::loadTemplate('main', 'index', $data);
?>
