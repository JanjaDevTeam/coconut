<?php
class User {
	
	private $id;
	private $fbid;
	private $fbuname;
	private $fbfullname;
	private $fbemail;
	private $ativo;
	private $dataRegistro;
	private $dataAcesso;
	
	
	# setters
	public function setId($id) {
		$this->id = $id;
	}
	public function setFbid($fbid) {
		$this->fbid = $fbid;
	}
	public function setFbuname($fbuname) {
		$this->fbuname = $fbuname;
	}
	public function setFbfullname($fbfullname) {
		$this->fbfullname = $fbfullname;
	}
	public function setFbemail($fbemail) {
		$this->fbemail = $fbemail;
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
	public function getFbid() {
		return $this->fbid;
	}
	public function getFbuname() {
		return $this->fbuname;
	}
	public function getFbfullname() {
		return $this->fbfullname;
	}
	public function getFbemail() {
		return $this->fbemail;
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
