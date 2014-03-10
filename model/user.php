<?php
class User {
	
	private $id;
	private $nome; //fullname
	private $email;
	private $senha;
	private $fbuser;
	private $level;
	private $ativo;
	
	public function __construct() {
		//echo "Hello user\n";
	}
	
	# setters
	public function setId($id) {
		$this->id = $id;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function setSenha($senha) {
		$this->password = md5(trim($senha));
	}
	public function setLevel($level) {
		$this->level = $level;
	}
	public function setFbuser($fbuser) {
		$this->fbuser = $fbuser;
	}
	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	
	# getters
	public function getId() {
		return $this->id;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getSenha() {
		return $this->senha;
	}
	public function getLevel() {
		return $this->level;
	}
	public function getFbuser() {
		return $this->fbuser;
	}
	public function getAtivo() {
		return $this->ativo;
	}
}
?>
