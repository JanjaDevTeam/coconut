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
		$nome     = $user->getNome();
		$email    = $user->getEmail();
		$senha    = $user->getSenha();
		$level    = $user->getLevel();
		$fbuser   = $user->getFbuser();
		
		
		if (!isset($id)) {
			$sql = "INSERT INTO user (nome, email, senha, fbuser, level, ativo) 
			VALUES ('$nome', '$email', '$senha', '$fbuser', $level, 0)";
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
			$id = $this->lastInsertId();
			$user->setId($id);
		} else {
			$sql = "UPDATE user SET nome='$nome', email='$email', level=$level, fbuser='$fbuser' 
			WHERE id = " . $id;
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
		}
		return $user;
	}
	
	
	
	public function loadUser($id) {
		$sql = "SELECT nome, email, fbuser, senha, level, ativo FROM user 
		WHERE id = " . $id;
		$stmt = $this->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$user = new User;
		$user->setId($id);
		$user->setNome($result[0]['nome']);
		$user->setEmail($result[0]['email']);
		$user->setLevel($result[0]['level']);
		$user->setAtivo($result[0]['ativo']);
		$user->setFbuser($result[0]['fbuser']);
		
		return $user;
	}
	
	public function getUserByFbEmail($email) {
		$sql = "SELECT id FROM user WHERE email = '$email'";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if (sizeof($result) > 0) {
			$id = $result[0]['id'];
			$user = $this->loadUser($id);
			return $user;
			
		}
		return False;
	}
	
	public function trocarSenha($user) {
		$id = $user->getId();
		$password = $user->getPassword();
		$sql = "UPDATE user SET password='$password' WHERE id = $id";
		$stmt = $this->prepare($sql);
		$stmt->execute();
		return $user;
	}
	
	######### LOGAR #############
	public function getUserByFormLogin($email, $senha) {
		$senha = md5(addslashes(trim($senha)));
		$sql = "SELECT id FROM user WHERE email='$email' AND senha='$senha'";
		$stmt = $this->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if (sizeof($result) == 0) { 
			return False; 
		}else {
			$id = $result['0']['id'];
			$user = $this->loadUser($id);
			return $user;
		}		
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
