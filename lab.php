<?php
require_once('controller/controller_projeto.php');
require_once('model/projeto.php');
require_once('lib/janja.php');

$zord = new ControllerProjeto;
//$zord->Perfil(1);

$projeto = new Projeto;

$projeto->setId(1);
$projeto->setIdUser(2);
$projeto->setIdCategoria(3);
$projeto->setcategoria('finalizado');
$projeto->setNome('Ceilondon Project');
$projeto->setDescricao('Legalization WorldWide');
$projeto->setFrase('Janja time.');
$projeto->setValor(15500.90);
$projeto->setPrazo(30);
$projeto->setVideo('http://youtube.com');
$projeto->setDataRegistro(Date('d/m/Y'));
$projeto->setAtivo(1);


Janja::Debug($projeto);

?>
