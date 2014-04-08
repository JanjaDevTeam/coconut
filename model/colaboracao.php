<?php

class Colaboracao {
	private $id;
	private $idProjeto;
	private $valor;
	private $descricao;
	private $qtdTotal;
	private $qtdComprada;
	private $colaboracao; // array

	public function setId($id) {
		$this->id = $id;
	}
	public function setIdProjeto($idProjeto) {
		$this->idProjeto = $idProjeto;
	}
	public function setValor($valor) {
		$this->valor = $valor;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	public function setQtdTotal($qtdTotal) {
		$this->qtdTotal = $qtdTotal;
	}
	public function setQtdComprada($qtdComprada) {
		$this->qtdComprada = $qtdComprada;
	}
	public function getColoaboracao($colaboracao) {
		$this->colaboracao = $colaboracao;
	}
	
	
	
	

	public function getId() {
		return $this->id;
	}
	public function getIdProjeto() {
		return $this->idProjeto;
	}
	public function getValor() {
		return $this->valor;
	}
	public function getDescricao() {
		return $this->descricao;
	}
	public function getQtdTotal() {
		return $this->qtdTotal;
	}
	public function getQtdComprada() {
		return $this->qtdComprada;
	}
	public function setColaboracao() {
		return $this->colaboracao;
	}
}
?>
