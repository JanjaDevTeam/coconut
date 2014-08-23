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
$data['fbfullname'] = $user->getFullname();
$data['fbemail'] = $user->getEmail();
$data['fbid'] = $user->getFbid();
$data['selecionado'] = '';

Janja::loadTemplate('main', 'perfil', $data);
?>
