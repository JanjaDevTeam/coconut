<?php
require_once('model/database.php');
require_once('model/user.php');
require_once('model/carteiro.php');
require_once('lib/janja.php');

class ControllerLogin {
	#loga pela api do facebook
	public function loginFb($email, $fullname, $fbId) {
		$db = new Database;
		$user = $db->getUserByEmail($email);
		
		# caso não ache no banco, cadastra
		if ($user == Null) {
			
			$agora = $this->getNow();
			$user = new User;
			$user->setHasFb(1);
			$user->setHasAcc(0);
			$user->setFbId($fbId);
			$user->setEmail($email);
			$user->setFullname($fullname);
			$user->setDataRegistro($agora);
			$user->setDataAcesso($agora);
			$user->setAtivo(1);
			$user = $db->saveUser($user);
			
			$url = "https://graph.facebook.com/" .  $fbId . "/picture?type=square";
			$img = "img/userpics/" . $user->getId() . ".jpg";
			copy($url, $img);
			
			$_SESSION = array();
			$_SESSION['userId'] = $user->getId();
			$_SESSION['userName'] = $user->getFullname();
			$_SESSION['fbId'] = $user->getFbId();
			
			header('location: index.php');
			return True;
			
		} else {
		
			# caso exista no banco e tenha fb, registra na sessão;

			$url = "https://graph.facebook.com/" .  $fbId . "/picture?type=square";
			$img = "img/userpics/" . $user->getId() . ".jpg";
			copy($url, $img);
			
			$_SESSION = array();
			$_SESSION['userId'] = $user->getId();
			$_SESSION['userName'] = $user->getFullname();
			$_SESSION['fbId'] = $fbId;
			
			$user->setDataAcesso($this->getNow());
			$user = $db->saveUser($user);

			if ($user->getHasFb() == 1) { 
				header('location: index.php');
			} else if ($user->getHasFb() == 0) {
				$user->setHasFb(1);
				$user->setFbId($fbId);
				$user = $db->saveUser($user);
				header('location: index.php?msg=u');
			}
			return True;
		}
		
	}
	
	public function loginAcc($email, $password) {
		$db = new Database;
		$user = new User;
		$user->setEmail($email);
		$user->setPassword($password);
		$user = $db->getUserByAccount($user);
		
		# login com sucesso.
		if ($user != Null) {
			#registra na sessão
			$_SESSION = array();
			$_SESSION['userId'] = $user->getId();
			$_SESSION['userName'] = $user->getFullname();
			if ($user->getHasFb() == 1) { $_SESSION['fbId'] = $user->getFbId(); }
			
			$user->setDataAcesso($this->getNow());
			$user = $db->saveUser($user);

			header('location: index.php');
			return True;
			
		} else {
			header('location: logar.php?action=erro');
			return False;
		}
	}
	
	// Redefine senha
	public function tokenSenha($email) {
			$db = new Database;
			$user = $db->getUserByEmail($email);
			if ($user == Null) {
				return false;
			} else {
				$token  = $this->genToken();
				$idUser = $user->getId();
				$motivo = "senha";
				$now = $this->getNow();
				$db->saveToken($idUser, $now, $token, $motivo);
				Carteiro::emailSenha($email, $token);

				return true;
			}

		return true;
			
	}

	public function redefinirSenha($token) {
		$db = new Database;
		//verifica se o token existe ou se expirou
		$tokenArray = $db->getTokenByToken($token);

	} 

	public function registrar($email, $fullname, $password, $password2) {

		// valida senha aqui
		if (trim($password) != trim($password2) && len($password) >= 6) {
			return false;
		}

		$db = new Database;
		$user = $db->getUserByEmail($email);

		# caso exista, verifica se possui cadastro por conta
		if ($user != Null) {
			if ($user->getHasAcc() == 1) {
				// usuário já possui conta, redirecionar
				header("location: registrar.php?msg=acc");
				return false;
			} else {
				// registrou primeiro pelo fb
				header("location: registrar.php?msg=fb");
				return false;
			}
		} else {
			// registra o usuário
			$now = $this->getNow();

			$user = new User;
			$user->setFullname($fullname);
			$user->setEmail($email);
			$user->setPassword($password);
			$user->setHasAcc(1);
			$user->setHasFb(0);
			$user->setAtivo(0);
			$user->setDataRegistro($now);
			$user->setDataAcesso($now);
			$user = $db->saveUser($user);

			//registra token de ativação
			$token  = $this->genToken();
			$idUser = $user->getId();
			$motivo = "cadastro";

			$db->saveToken($idUser, $now, $token, $motivo);

			// enviar email, 24 horas para ativar.
			Carteiro::emailCadastro($email, $token);

			return true;
		}

		return true;


	}


	public function ativarConta($token) {
		//imp
	}

	public function getToken($token) {
		$db = new Database;
		$tokenArray = $db->getTokenByToken($token);
		return $tokenArray;
	}

	public function getNow() {
		return date("Y-m-d H:i:s");
	}

	public function genToken() {
		$gen = "Coconut2014" . $this->getNow();
		return md5($gen);
	}
}

?>
