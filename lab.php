<?php
require_once('controller/controller_login.php');
require_once('model/user.php');
require_once('lib/janja.php');


$ct = new ControllerLogin;
$ct->newUser("teste@teste.com", "Zeh", "123", "123");
//print $ct->verificarToken("22b972fd500c3f03edac76e0df73ab8e");

?>
