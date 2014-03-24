<?php
require_once('model/database.php');
require_once('model/projeto.php');
require_once('lib/janja.php');

$db = new Database;
$projeto = new Projeto;


/*
$projeto->setIdUser(1);
$projeto->setIdCategoria(1);
$projeto->setNome('Ceilondon Project');
$projeto->setDescricao('Janja Description');
$projeto->setFrase('Janja time.');
$projeto->setValor(15500.90);
$projeto->setPrazo(30);
$projeto->setVideo('http://www.youtube.com/watch?v=5BQHq4s_qHo');
$projeto->setAtivo(1);

$db->saveProjeto($projeto);
*/

$projeto = $db->getProjeto(1);
Janja::Debug($projeto);


?>
