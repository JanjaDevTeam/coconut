<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/user.php');

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$db = new Database();

$user = $db->getUserByFormLogin($email, $senha);

if(!is_object($user)) {
	header('Location: logar.php?action=erro');
}

$_SESSION['user']['email']  = $user->getEmail();
$_SESSION['user']['nome']   = $user->getNome();
$_SESSION['user']['id']     = $user->getId();
$_SESSION['user']['fbuser'] = $user->getFbuser();
$_SESSION['user']['ativo']  = $user->getAtivo();
$_SESSION['logado'] = True;

header('location: index.php');
