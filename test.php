<?php
require_once('model/user.php');
require_once('model/database.php');
require_once('lib/janja.php');

$db = new Database;
$user = new User;

# cria usuário
$user->setName('Anakin Skywalker');
$user->setEmail('vader@sw.com');
$user->setPassword('vader');
$user->setLevel(2);
$user = $db->saveUser($user);

Janja::debug($user); 
echo '<br/><br/>';
Janja::dump($user); 
?>
