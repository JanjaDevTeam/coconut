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

		/*
		$config = array(
			'db_type' => 'mysql',
			'db_host' => 'localhost',
			'db_name' => 'rc2co684_coconut',
			'db_username' => 'rc2co684_coconut',
			'db_password' => 'janja2099'
		);
		*/
		
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
		$fbId         = $user->getFbId();
		$fullname      = $user->getFullname();
		$email      = $user->getEmail();
		$hasFb      = $user->getHasFb();
		$password   = $user->getPassword();
		$hasAcc     = $user->getHasAcc();
		$ativo        = $user->getAtivo();
		$dataRegistro = $user->getDataRegistro();
		$dataAcesso   = $user->getDataAcesso();
		
		
		if ($id == null) {
			$sql = "INSERT INTO user (fullname, fbId, email, hasFb, hasAcc, password, ativo, dataRegistro, dataAcesso) 
			VALUES ('$fullname', '$fbId', '$email', '$hasFb', '$hasAcc', '$password', $ativo, '$dataRegistro', '$dataAcesso')";
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
			$id = $this->lastInsertId();
			$user->setId($id);
		} else {
			$sql = "UPDATE user SET fullname='$fullname', email='$email', hasFb='$hasFb', hasAcc='$hasAcc',
			ativo=$ativo, dataRegistro='$dataRegistro', dataAcesso='$dataAcesso'   
			WHERE id = " . $id;
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
		}
		return $user;
	}
	
	public function saveToken($idUser, $dataRegistro, $token, $motivo) {
		$sql = "INSERT INTO token (idUser, dataRegistro, token, motivo) 
		VALUES ($idUser, '$dataRegistro', '$token', '$motivo')";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		return true;
	}

	public function delToken($token) {
		$sql = "DELETE FROM token where token = '$token'";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		return true;
	}
	
	public function getUser($id) {
		$sql = "SELECT email, password, fullname, hasFb, hasAcc, fbId, ativo, dataRegistro, dataAcesso FROM user 
		WHERE id = " . $id;
		$stmt = $this->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$user = new User;
		$user->setId($id);
		$user->setFbId($result[0]['fbId']);
		$user->setFullname($result[0]['fullname']);
		$user->setEmail($result[0]['email']);
		$user->setPassword($result[0]['password']);
		$user->setAtivo($result[0]['ativo']);
		$user->setHasFb($result[0]['hasFb']);
		$user->setHasAcc($result[0]['hasAcc']);
		$user->setDataRegistro($result[0]['dataRegistro']);
		$user->setDataAcesso($result[0]['dataAcesso']);
		
		return $user;

	}
	
	public function getUserByEmail($email) {
		$sql = "SELECT id FROM user WHERE email = '$email'";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if (sizeof($result) > 0) {
			$id = $result[0]['id'];
			$user = $this->getUser($id);
			return $user;
			
		}
		return False;
	}
	
	public function getUserByAccount($user) {
		$email = $user->getEmail();
		$password = $user->getPassword();
		$sql = "SELECT id FROM user WHERE email = '$email' AND password ='$password' AND hasAcc='1'";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if (sizeof($result) > 0) {
			$id = $result[0]['id'];
			$user = $this->getUser($id);
			return $user;
			
		}
		return False;
	}

	public function getTokenByToken($token) {
		$sql = "SELECT idUser, dataRegistro, token, motivo 
		FROM token where token='$token'";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
	
	public function getVipList() {
		$sql = "SELECT fbemail FROM vip";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$vip = array();
		foreach ($result as $v) {
			$vip[] = $v['fbemail'];
		}

		return $vip;
	}
	
	#### PROJETO

	public function toggleAnalise($proj) {
		$analise = ($proj->getAnalise() == 0) ? 1 : 0;
		$id = $proj->getId();
		$sql = "UPDATE projeto set analise = $analise WHERE id = $id";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		$proj->setAnalise($analise);

		return $proj;
		
	}

	public function toggleAtivo($proj) {
		$ativo = ($proj->getAtivo() == 0) ? 1 : 0;
		$id = $proj->getId();
		$sql = "UPDATE projeto set ativo = $ativo WHERE id = $id";
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		$proj->setAtivo($ativo);

		return $proj;
		
	}

	public function getProjeto($id) {

		// implementar
		$sql = 'SELECT idUser, idCategoria, nome, descricao, frase, valor, valorArrecadado, prazo, video, links, ativo, analise, dataRegistro, categoria 
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
		$projeto->setLinks($result[0]['links']);
		$projeto->setDataRegistro($result[0]['dataRegistro']);
		$projeto->setAtivo($result[0]['ativo']);
		$projeto->setAnalise($result[0]['analise']);

		return $projeto;


	}

	public function saveProjeto($projeto) {
		$id          = $projeto->getId();
		$idUser      = $projeto->getIdUser();
		$idCategoria = $projeto->getIdCategoria();
		$descricao   = $projeto->getDescricao();
		$nome        = $projeto->getNome();
		$descricao   = $projeto->getDescricao();
		$frase       = $projeto->getFrase();
		$valor       = $projeto->getValor();
		$valorArrecadado = $projeto->getValorArrecadado();
		$prazo       = $projeto->getPrazo();
		$video       = $projeto->getVideo();
		$links       = $projeto->getLinks();
		$ativo       = $projeto->getAtivo();
		$analise     = $projeto->getAnalise();


		if ($id == null) {
			$valorArrecadado = 0;
			# grava o projeto no banco
			$sql = "INSERT INTO projeto 
			(idUser, idCategoria, nome, descricao, frase, valor, valorArrecadado, prazo, video, links, ativo, analise) 
			VALUES ($idUser, $idCategoria, '$nome', '$descricao', '$frase', $valor, $valorArrecadado,  $prazo, '$video', '$links', $ativo, $analise)";
			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
			$projeto->setId($this->lastInsertId());

			return $projeto;

			

		} else {

			// testar após getProjeto

			$sql = "UPDATE projeto SET 
			idCategoria = $idCategoria, nome ='$nome', descricao='$descricao', frase='$frase', 
			valor=$valor, valorArrecadado = $valorArrecadado, prazo='$prazo', video='$video', 
			links='$links', ativo=$ativo, analise=$analise  
			WHERE id = $id";

			$stmt = $this->prepare($sql);
			$result = $stmt->execute();

			return $projeto;

		}


	}

	public function getAbertosList() {
		$sql = 'SELECT projeto.id as id, idCategoria, categoria, nome 
		FROM projeto, categoria 
		WHERE analise = 1 AND projeto.idCategoria = categoria.id';
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function getAtivosList() {
		$sql = 'SELECT projeto.id as id, idCategoria, categoria, nome 
		FROM projeto, categoria 
		WHERE ativo = 1 AND projeto.idCategoria = categoria.id';
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function getOwnerInfo($idProjeto) {
		$sql = 'SELECT fbfullname, fbemail FROM user, projeto 
		WHERE projeto.idUser = user.id AND projeto.id = ' . $idProjeto;

		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result[0];
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
	
	public function getColaboracaoByProjeto($idProjeto) {
		$sql = 'SELECT id, valor, descricao, qtdTotal, qtdComprada 
		FROM colaboracao WHERE idProjeto = ' . $idProjeto;
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$colArray = array();
		foreach($result as $col) {
			$colaboracao = new Colaboracao;
			$colaboracao->setId($col['id']);
			$colaboracao->setIdProjeto($idProjeto);
			$colaboracao->setValor($col['valor']);
			$colaboracao->setDescricao($col['descricao']);
			$colaboracao->setQtdTotal($col['qtdTotal']);
			$colaboracao->setQtdComprada($col['qtdComprada']);
			
			$colArray[] = $col;
		}
		
		return $colArray;
	}


	public function saveColaboracao($colaboracao) {


		$id          = $colaboracao->getId();
		$idProjeto   = $colaboracao->getIdProjeto();
		$valor       = $colaboracao->getValor();
		$descricao   = $colaboracao->getDescricao();
		$qtdTotal    = $colaboracao->getQtdTotal();
		$qtdComprada = $colaboracao->getQtdComprada();
		if ($id == NULL) {
			$sql = "INSERT INTO colaboracao 
			(idProjeto, valor, descricao, qtdTotal, qtdComprada) 
			values ($idProjeto, $valor, '$descricao', $qtdTotal, $qtdComprada)";

			$stmt = $this->prepare($sql);
			$result = $stmt->execute();

			$id = $this->lastInsertId();
			$colaboracao->setId($id);

		} else {
			$colaboracao->setId($id);
			$sql = "UPDATE colaboracao 
			SET valor=$valor, descricao='$descricao', qtdTotal=$qtdTotal 
			WHERE id = $id";

			$stmt = $this->prepare($sql);
			$result = $stmt->execute();
			
		}


		return $colaboracao;
	}

	public function delColaboracao($colab) {
		$id = $colab->getId();

		$erro = array();
		//verifica se tem vendas amarradas
		$sql = 'SELECT COUNT(id) as count FROM user_colaboracao 
		WHERE idColaboracao =' . $id;
		$stmt   = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$count  = $result[0]['count'];

		if ($count > 0) {
			$erro[] = 0;
			return $erro;
		}

		$sql = 'DELETE FROM colaboracao WHERE id=' . $id;
		print $sql;

		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		return $erro;
	}

	function getColabBySeed($seed) {
		$sql = "SELECT idColaboracao FROM user_colaboracao WHERE seed = '$seed'";
		$stmt   = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$idColab = $result[0]['idColaboracao'];

		$colab = $this->getColaboracao($idColab);
		return $colab;
	}
	
	#### USER COLABORAÇÃO
	function saveUserColaboracao($idUser, $idColaboracao, $seed) {
		$sql = "INSERT INTO user_colaboracao 
		(idUser, idColaboracao, seed) VALUES 
		($idUser, $idColaboracao, '$seed')";

		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		return True;

	}

	function updateUserColaboracaoBySeed($seed, $statusPagamento) {
		$sql = "UPDATE user_colaboracao SET statusMoip=$statusPagamento WHERE seed='$seed'";
		print $sql;
		$stmt = $this->prepare($sql);
		$result = $stmt->execute();

		return True;

	}

	function getUserColaboracao($id) {
		$sql = 'SELECT idUser, idColaboracao, dataRegistro 
		FROM user_colaboracao WHERE id = ' . $id;

		$stmt  = $this->prepare($sql);
		$result = $stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$uc = new UserColaboracao;
		$uc->setId($id);
		$uc->setIdUser($result[0]['idUser']);
		$uc->setIdColaboracao($result[0]['idColaboracao']);
		$uc->setDataRegistro($result[0]['dataRegistro']);

		return $uc;
	}
	
	#moip
	function insertMoipNasp($data){
		$idTransacao      = $data['idTransacao'];
		$valor            = $data['valor'];
		$statusPagamento  = $data['statusPagamento'];
		$codMoip          = $data['codMoip'];
		$formaPagamento   = $data['formaPagamento'];
		$tipoPagamento    = $data['tipoPagamento'];
		$emailConsumidor  = $data['emailConsumidor'];

		$sql = "INSERT INTO moip_nasp 
		(idTransacao, valor, statusPagamento, codMoip, formaPagamento, tipoPagamento, emailConsumidor) 
		VALUES ('$idTransacao', $valor, $statusPagamento, '$codMoip', $formaPagamento, '$tipoPagamento', '$emailConsumidor')";

		$stmt = $this->prepare($sql);
		$result = $stmt->execute();
	}
}
?>
