<?php
require_once('model/user.php');

class Database extends PDO {
	public function __construct() {
		$config = array(
			'db_type' => 'mysql',
			'db_host' => 'localhost',
			'db_name' => 'Coconut',
			'db_username' => 'janjaCoconut',
			'db_password' => 'janjaCoconut'
		);
		
		try {
			parent::__construct($config['db_type'].':host='.$config['db_host'].';dbname='.$config['db_name'],$config['db_username'],$config['db_password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){				
				die('ERROR: '. $e->getMessage());
		}
	}
	
	# user
	public function saveUser($user) {
		$id       = $user->getId();
		$name     = $user->getName();
		$email    = $user->getEmail();
		$password = $user->getPassword();
		$level    = $user->getLevel();
		
		
		if (!isset($id)) {
			$sql = "INSERT INTO user (name, email, password, level) 
			VALUES ('$name', '$email', '$password', $level)";
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
			$id = $this->lastInsertId();
			$user->setId($id);
		} else {
			$sql = "UPDATE user SET name='$name', email='$email', level=$level 
			WHERE id = " . $id;
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
		}
		return $user;
	}
	
	public function loadUser($id) {
		$sql = "SELECT name, email, password, level FROM user 
		WHERE id = " . $id;
		$stmt = $this->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$user = new User;
		$user->setId($id);
		$user->setName($result[0]['name']);
		$user->setEmail($result[0]['email']);
		$user->setLevel($result[0]['level']);
		
		return $user;
	}
	
	public function trocarSenha($user) {
		$id = $user->getId();
		$password = $user->getPassword();
		$sql = "UPDATE user SET password='$password' WHERE id = $id";
		$stmt = $this->prepare($sql);
		$stmt->execute();
		return $user;
	}
	
	###### PROJETOS #######
	public function getCotasByProject($id) {
		$sql = "SELECT id, valor, descricao, quantidade FROM cotas WHERE id_projeto = $id";
		$stmt = $this->prepare($sql);
		$stmt->execute();
		$cotas = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$count = 0;
		foreach($cotas as $cota) {
			$sql = "SELECT SUM(quantidade) as quantidade FROM user_cotas where id_cotas=$cota[id]";
			$stmt = $this->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$quantidade = $result['0']['quantidade'];
			$cotas[$count]['vendidas'] = $quantidade;
			$count ++;
		}
		
		return $cotas;
	
	}
	
	
}
?>
