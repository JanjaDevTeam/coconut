<?php

session_start();

require_once('model/user.php');
require_once('model/database.php');
require_once('lib/janja.php');

class ControllerProjeto {
	public function Perfil($id) {
		$user = new User;
		$db = new Database;

		$user = $db->loadUser($id);
		$data['user'] = $user;
		$data['selecionado'] = '';

		Janja::loadTemplate('main', 'lab', $data);
	}
}

?>