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
		$id           = $user->getId();
		$fbid         = $user->getFbid();
		$fbuname      = $user->getFbuname();
		$fbfullname   = $user->getFbfullname();
		$fbemail      = $user->getFbemail();
		$ativo        = $user->getAtivo();
		$dataRegistro = $user->getDataRegistro();
		$dataAcesso   = $user->getDataAcesso();
		
		
		if (!isset($id)) {
			$sql = "INSERT INTO user (fbid, fbuname, fbfullname, fbemail, ativo, dataRegistro, dataAcesso) 
			VALUES ($fbid, '$fbuname', '$fbfullname', '$fbemail', $ativo, '$dataRegistro', '$dataAcesso')";
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
			$id = $this->lastInsertId();
			$user->setId($id);
			$user->setAtivo(0);
		} else {
			$sql = "UPDATE user SET fbuname='$fbuname', fbfullname='$fbfullname', fbemail='$fbemail', 
			ativo=$ativo, dataRegistro='$dataRegistro', dataAcesso='$dataAcesso'   
			WHERE id = " . $id;
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
		}
		return $user;
	}
	
	
	
	public function loadUser($id) {
		$sql = "SELECT fbid, fbuname, fbfullname, fbemail, ativo, dataRegistro, dataAcesso FROM user 
		WHERE id = " . $id;
		$stmt = $this->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$user = new User;
		$user->setId($id);
		$user->setFbid($result[0]['fbid']);
		$user->setFbuname($result[0]['fbuname']);
		$user->setFbfullname($result[0]['fbfullname']);
		$user->setFbemail($result[0]['fbemail']);
		$user->setAtivo($result[0]['ativo']);
		$user->setDataRegistro($result[0]['dataRegistro']);
		$user->setDataAcesso($result[0]['dataAcesso']);
		
		return $user;
	}
	
	public function getUserByFbEmail($fbemail) {
		$sql = "SELECT id FROM user WHERE fbemail = '$fbemail'";
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
	
	
	###### PROJETOS #######
	public function getProjeto {

		// implementar
		$sql = "";

	}

	public function saveProjeto($projeto) {
		$id = $projeto->getId();
		$idUser = $projeto->getIdUser();
		$idCategoria = $projeto->getIdCategoria();
		$descricao = $projeto->getDescricao();
		$nome = $projeto->getNome();
		$descricao = $projeto->getDescricao();
		$frase = $projeto->getFrase();
		$valor = $projeto->getValor();
		$prazo = $projeto->getPrazo();
		$video = $projeto->getVideo();
		$ativo = $projeto->getAtivo();

		if ($id != NULL) {
			

			$sql = "INSERT INTO projeto 
			(idUser, idCategoria, nome, descricao, frase, valor, prazo, video, ativo) 
			VALUES ($idUser, $idCategoria, 'nome', '$descricao', '$frase', '$valor', $prazo, '$video', $ativo)";

			print $sql;

			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
		} else {

			// testar após o load

			$sql = "UPDATE projeto SET 
			nome='$nome', descricao='$descricao', frase='$frase', valor=$valor, prazo='$prazo', video='$video', ativo=$ativo 
			WHERE id = $id";

			return;

		}


	}


	/*
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
	*/
	
}
?>
