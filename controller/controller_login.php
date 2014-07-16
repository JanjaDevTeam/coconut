<?php
require_once('model/database.php');
require_once('model/user.php');
require_once('lib/janja.php');

class ControllerLogin {
	#loga pela api do facebook
	public function loginFb($email, $fullname, $fbId) {
		$db = new Database;
		$user = $db->getUserByEmail($email);
		
		# caso não ache no banco, cadastra
		if ($user == Null) {
			print "Cadastrando novo usuário <br/>";
			
			$agora = date("Y-m-d H:i:s");
			$user = new User;
			$user->setHasFb(1);
			$user->setHasAcc(0);
			$user->setFbId($fbId);
			$user->setEmail($email);
			$user->setFullname($fullname);
			$user->setDataRegistro($agora);
			$user->setDataAcesso($agora);
			$user = $db->saveUser($user);
			
			$url = "https://graph.facebook.com/" .  $fbId . "/picture?type=large";
			$img = "img/userpics/" . $user->getId() . ".jpg";
			copy($url, $img);
			
			$_SESSION = array();
			$_SESSION['userId'] = $user->getId();
			$_SESSION['userName'] = $user->getFullname();
			$_SESSION['fbId'] = $user->getFbId();
			
			header('location: index.php');
			return True;
			
		}
		
		# caso exista no banco e tenha fb, registra na sessão;
		if (is_object($user) && $user->getHasFb() == 1) {
			
			$_SESSION = array();
			$_SESSION['userId'] = $user->getId();
			$_SESSION['userName'] = $user->getFullname();
			$_SESSION['fbId'] = $user->getFbId();
			
			$user->setDataAcesso(date("Y-m-d H:i:s"));
			$user = $db->saveUser($user);
			
			$url = "https://graph.facebook.com/" .  $user->getFbId() . "/picture?type=square";
			$img = "img/userpics/" . $user->getId() . ".jpg";
			copy($url, $img);
			header('location: index.php');
			return True;
		}
		
		# caso exista no banco e não tenha fb, pede a senha para unificar as contas
		if (is_object($user) && $user->getHasFb() == 0) {
			# registrar na sessão apenas se digitar a senha
			print "Digite sua senha para unificar as contas.<br/>";
		}
		
		Janja::Debug($user);
		exit;
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
			
			$user->setDataAcesso(date("Y-m-d H:i:s"));
			$user = $db->saveUser($user);

			header('location: index.php');
			return True;
			
		} else {
			header('location: logar.php?action=erro');
			return False;
		}
	}
}

?>
