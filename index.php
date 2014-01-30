<?php
require_once('lib/janja.php');

$data['nome'] = 'Lord Vader';

Janja::loadTemplate('main', 'teste', $data);
?>
