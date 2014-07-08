<?php
require_once('controller/controller_login.php');
require_once('model/user.php');
require_once('lib/janja.php');

$ct = new ControllerLogin;
$user = new User;
$user->setEmail('brunocanongia@gmail.com');
$user->setPassword('bruno');
$ct->loginAcc($user);

?>
