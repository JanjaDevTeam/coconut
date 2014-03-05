<?php
require_once('lib/janja.php');
require_once('model/user.php');
require_once('model/database.php');

if(isset($_POST['token']) && $_POST['token'] == 'c6dac7f7fb5c8203d2abbceee452e30b') {
	Janja::debug($_POST);
	# cadastra usuário
	$fullname = $_POST['fullname'];
	$email    = $_POST['email'];
	$email2   = $_POST['email2'];
	$senha    = $_POST['senha'];
	$senha2   = $_POST['senha2'];
	
	$user = new User;
	$user->setName($fullname);
	$user->setEmail($email);
	$user->setPassword($senha);
	$user->setLevel(2);
	
	Janja::debug($user);
	
	$db = new Database();
	$user = $db->saveUser($user);
	
	
	
} else {
	$data['selecionado'] = 'registrar';

	Janja::loadTemplate('main', 'user/cadastro', $data);
}

?>
