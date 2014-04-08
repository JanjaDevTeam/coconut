<?php
require_once('controller/controller_projeto.php');
require_once('lib/janja.php');

$ct = new ControllerProjeto;
$proj = $ct->getProjetoCompleto(1);

Janja::Debug($proj['diasRestantes']);
?>
