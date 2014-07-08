<?php
class User {
	
	private $id;
	private $email;
	private $hasFb;
	private $hasAcc;
	private $password;
	private $fullname;
	private $fbId;
	private $ativo;
	private $dataRegistro;
	private $dataAcesso;
	
	
	# setters
	public function setId($id) {
		$this->id = $id;
	}
	public function setFbId($fbid) {
		$this->fbId = $fbid;
	}

	public function setFullname($fullname) {
		$this->fullname = $fullname;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function setHasFb($set) {
		$this->hasFb = $set;
	}
	public function setHasAcc($set) {
		$this->hasAcc = $set;
	}
	public function setPassword($password) {
		$this->password = md5($password);
	}
	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	public function setDataRegistro($data) {
		$this->dataRegistro = $data;
	}
	public function setDataAcesso($data) {
		$this->dataAcesso = $data;
	}

	

	# getters
	public function getId() {
		return $this->id;
	}
	public function getFbId() {
		return $this->fbId;
	}
	public function getFullname() {
		return $this->fullname;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getHasFb() {
		return $this->hasFb;
	}
	public function getHasAcc() {
		return $this->hasAcc;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getAtivo() {
		return $this->ativo;
	}
	public function getDataRegistro() {
		return $this->dataRegistro;
	}
	public function getDataAcesso() {
		return $this->dataAcesso;
	}

}
?>
