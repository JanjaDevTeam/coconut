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
	

	public function getCategoria () {
		$sql = "SELECT id, categoria FROM categoria ORDER BY categoria";
		$stmt = $this->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}


	#### USER

	public function saveUser($user) {
		$id           = $user->getId();
		$fbid         = $user->getFbid();
		$fbuname      = $user->getFbuname();
		$fbfullname   = $user->getFbfullname();
		$fbemail      = $user->getFbemail();
		$ativo        = $user->getAtivo();
		$dataRegistro = $user->getDataRegistro();
		$dataAcesso   = $user->getDataAcesso();
		
		
		if ($id == null) {
			$sql = "INSERT INTO user (fbid, fbuname, fbfullname, fbemail, ativo, dataRegistro, dataAcesso) 
			VALUES ($fbid, '$fbuname', '$fbfullname', '$fbemail', 1, '$dataRegistro', '$dataAcesso')";
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
			$id = $this->lastInsertId();
			$user->setId($id);
			$user->setAtivo(1);
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
	
	
	#### PROJETO

	public function getProjeto($id) {

		// implementar
		$sql = 'SELECT idUser, idCategoria, nome, descricao, frase, valor, valorArrecadado, prazo, video, ativo, dataRegistro, categoria 
		FROM projeto, categoria WHERE projeto.idCategoria = categoria.id AND projeto.id = ' . $id;
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$projeto = new Projeto;

		$projeto->setId($id);
		$projeto->setIdUser($result[0]['idUser']);
		$projeto->setIdCategoria($result[0]['idCategoria']);
		$projeto->setCategoria($result[0]['categoria']);
		$projeto->setNome($result[0]['nome']);
		$projeto->setDescricao($result[0]['descricao']);
		$projeto->setFrase($result[0]['frase']);
		$projeto->setValor($result[0]['valor']);
		$projeto->setValorArrecadado($result[0]['valorArrecadado']);
		$projeto->setPrazo($result[0]['prazo']);
		$projeto->setVideo($result[0]['video']);
		$projeto->setDataRegistro($result[0]['dataRegistro']);
		$projeto->setAtivo($result[0]['ativo']);

		return $projeto;


	}

	public function saveProjeto($projeto) {
		$id          = $projeto->getId();
		$idUser      = $projeto->getIdUser();
		$idCategoria = $projeto->getIdCategoria();
		$descricao   = $projeto->getDescricao();
		$nome        = $projeto->getNome();
		$descricao   = $projeto->getDescricao();
		$frase = $projeto->getFrase();
		$valor = $projeto->getValor();
		$valorArrecadado = $projeto->getValorArrecadado();
		$prazo = $projeto->getPrazo();
		$video = $projeto->getVideo();
		$ativo = $projeto->getAtivo();


		if (!is_int($id)) {
			
			# grava o projeto no banco
			$sql = "INSERT INTO projeto 
			(idUser, idCategoria, nome, descricao, frase, valor, valorArrecadado, prazo, video, ativo) 
			VALUES ($idUser, $idCategoria, '$nome', '$descricao', '$frase', $valor, 0,  $prazo, '$video', $ativo)";
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
			$idProjeto = $this->lastInsertId();

		} else {

			// testar após getProjeto

			$sql = "UPDATE projeto SET 
			idCategoria = $idCategoria, nome ='$nome', descricao='$descricao', frase='$frase', 
			valor=$valor, valorArrecadado = $valorArrecadado, prazo='$prazo', video='$video', ativo=$ativo 
			WHERE id = $id";

			$stmt = $this->prepare($sql);
			$result = $stmt->execute();

		}

		

		return True;


	}

	#### COLABORAÇÃO

	public function getColaboracao($id) {
		$sql = 'SELECT idProjeto, valor, descricao, qtdTotal, qtdComprada 
		FROM colaboracao WHERE id = ' . $id;
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$colaboracao = new Colaboracao;
		$colaboracao->setId($id);
		$colaboracao->setIdProjeto($result[0]['idProjeto']);
		$colaboracao->setValor($result[0]['valor']);
		$colaboracao->setDescricao($result[0]['descricao']);
		$colaboracao->setQtdTotal($result[0]['qtdTotal']);
		$colaboracao->setQtdComprada($result[0]['qtdComprada']);

		return $colaboracao;
	}


	public function saveColaboracao($colaboracao) {

		$idProjeto   = $colaboracao->getIdProjeto();
		$valor       = $colaboracao->getValor();
		$descricao   = $colaboracao->getDescricao();
		$qtdTotal    = $colaboracao->getQtdTotal();
		$qtdComprada = $colaboracao->getQtdComprada();

		$sql = "INSERT INTO colaboracao 
		(idProjeto, valor, descricao, qtdTotal, qtdComprada) 
		values ($idProjeto, $valor, '$descricao', $qtdTotal, $qtdComprada)";

		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		$id = $this->lastInsertId();
		$colaboracao->setId($id);

		return $colaboracao;
	}

	
	#### USER COLABORAÇÃO
	function saveUserColaboracao($idUser, $idColaboracao, $quantidade) {
		$sql = "INSERT INTO user_colaboracao 
		(idUser, idColaboracao, quantidade) VALUES 
		($idUser, $idColaboracao, '$quantidade')";

		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		return True;

	}

	function getUserColaboracao($id) {
		$sql = 'SELECT idUser, idColaboracao, quantidade, dataRegistro 
		FROM user_colaboracao WHERE id = ' . $id;

		$stmt  = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$uc = new UserColaboracao;
		$uc->setId($id);
		$uc->setIdUser($result[0]['idUser']);
		$uc->setIdColaboracao($result[0]['idColaboracao']);
		$uc->setQuantidade($result[0]['quantidade']);
		$uc->setDataRegistro($result[0]['dataRegistro']);

		return $uc;
	}
	
}
?>
