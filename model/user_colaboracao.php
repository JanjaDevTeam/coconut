<?php
class UserColaboracao {
	private $id;
	private $idUser;
	private $idColaboracao;
	private $seed;
	private $dataRegistro;

	public function setId($id) {
		$this->id = $id;
	}
	public function setIdUser($idUser) {
		$this->idUser = $idUser;
	}
	public function setIdColaboracao($idColaboracao) {
		$this->idColaboracao = $idColaboracao;
	}
	public function setDataRegistro($data) {
		$this->dataRegistro = $data;
	}
	public function setSeed($seed) {
		$this->seed = $seed;
	}
	public function getId() {
		return $this->id;
	}

	public function getIdUser() {
		return $this->idUser;
	}
	public function getSeed() {
		return $this->seed;
	}
	public function getIdColaboracao() {
		return $this->idColaboracao();
	}
	public function dataRegistro() {
		return $this->dataRegistro;
	}
}


?>