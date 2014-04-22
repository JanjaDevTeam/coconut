<?php
require_once('lib/janja.php');
require_once('lib/moip-php-master/lib/Moip.php');
require_once('lib/moip-php-master/lib/MoipClient.php');
require_once('model/database.php');
require_once('model/colaboracao.php');

$db = new Database;
$colab = $db->getColaboracao($_POST['id']);


$moip = new MoIP;
$moip->setCredential(array("key"=>"4VQGQOGKWA1QBHJEOR0HTAXNFSYIYNRYK9BDZ6YU", "token"=>"JB2QWDEXN3HKYH28JBZUFKFWHI1PJMJZ"));
$moip->setUniqueId(1234567);
$moip->setReason('Coconut - Fase de testes');
$moip->setValue($colab->getValor());
$moip->setEnvironment('test');
$moip->validate();
$moip->send();

$url = $moip->getAnswer()->payment_url;
Header("Location: $url");


?>
