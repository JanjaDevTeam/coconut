<?php
require_once('controller/controller_login.php');
require_once('model/user.php');
require_once('lib/janja.php');

/*
$ct = new ControllerLogin;
$user = new User;
$user->setEmail('brunocanongia@gmail.com');
$user->setPassword('bruno');
$ct->loginAcc($user);
*/

$user = new User;
$user->setFullname("Brunoid Janja Developer");
$user->setEmail("bruno@janjadev.com");
$user->setPassword("bruno");
$user->setHasAcc(1);
$user->setHasFb(0);
$user->setDataRegistro(date("Y-m-d H:i:s"));
$user->setDataAcesso(date("Y-m-d H:i:s"));

$db = new Database;
$user = $db->saveUser($user);
Janja::Debug($user);
?>
