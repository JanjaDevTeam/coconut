<?php
require_once('lib/janja.php');
require_once('model/user.php');
require_once('model/database.php');

if(!isset($_GET['id'])) { 
	Header('Location: index.php');
} else {
	$id = $_GET['id'];
}

session_start();

$db = new Database;
$user = $db->getUser($id);
$data['fbfullname'] = $user->getFbfullname();
$data['fbemail'] = $user->getFbemail();
$data['fbid'] = $user->getFbid();
$data['fbuname'] = $user->getFbuname();
$data['selecionado'] = '';

Janja::loadTemplate('main', 'perfil', $data);
?>
