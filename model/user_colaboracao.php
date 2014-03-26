<?php
class UserColaboracao {
	private $id;
	private $idUser;
	private $idColaboracao;
	private $quantidade;
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
	public function setQuantidade($quantidade) {
		$this->quantidade = $quantidade;
	}
	public function setDataRegistro($data) {
		$this->dataRegistro = $data;
	}

	public function getId() {
		return $this->id;
	}

	public function getIdUser() {
		return $this->idUser;
	}
	public function getIdColaboracao() {
		return $this->idColaboracao();
	}
	public function getQuantidade() {
		return $this->quantidade;
	}
	public function dataRegistro() {
		return $this->dataRegistro;
	}
}


?>