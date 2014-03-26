<?php
class Projeto {
	
	private $id;
	private $idUser; # proponente FK user.id
	private $idCategoria;  # FK
	private $categoria;
	private $nome;
	private $descricao;
	private $frase;
	private $valor;
	private $valorArrecadado;
	private $prazo; # em dias
	private $video;
	private $dataRegistro;
	private $ativo;
	private $colaboracao;


	# setters

	public function setId($id) {
		$this->id = $id;
	} 
	public function setIdUser($idUser) {
		$this->idUser = $idUser;
	}
	public function setIdCategoria($idCategoria) {
		$this->idCategoria = $idCategoria;
	}
	public function setCategoria($cat) {
		$this->categoria = $cat;
	}
	public function setIdStatus($idStatus) {
		$this->idStatus = $idStatus;
	}
	public function setNome ($nome) {
		$this->nome = $nome;
	}
	public function setDescricao($desc) {
		$this->descricao = $desc;
	}
	public function setFrase($frase) {
		$this->frase = $frase;
	}
	public function setValor($valor) {
		$this->valor = $valor;
	}
	public function setValorArrecadado($valor) {
		$this->valorArrecadado = $valor;
	}
	public function setPrazo($prazo) {
		$this->prazo = $prazo;
	}
	public function setVideo($video) {
		$this->video = $video;
	}
	public function setDataRegistro($data) {
		$this->dataRegistro = $data;
	}
	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	public function setColaboracao($colaboracao) {
		$this->colaboracao = $colaboracao;
	}

	# getters

	public function getId() {
		return $this->id;
	}
	public function getIdUser() {
		return $this->idUser;
	}
	public function getIdCategoria() {
		return $this->idCategoria;
	}
	public function getCategoria() {
		return $this->categoria;
	}
	public function getIdStatus() {
		return $this->idStatus;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getDescricao() {
		return $this->descricao;
	}
	public function getFrase() {
		return $this->frase;
	}
	public function getValor() {
		return $this->valor;
	}
	public function getValorArrecadado() {
		return $this->valorArrecadado;
	}

	public function getPorcentagem() {
		$pct = ($this->valorArrecadado / $this->valor) * 100;
		return round($pct);
	}

	public function getPrazo() {
		return $this->prazo;
	}
	public function getVideo() {
		return $this->video;
	}
	public function getRegistro() {
		return $this->registro;
	}
	public function getAtivo() {
		return $this->ativo;
	}
	public function getColaboracao() {
		return $this->colaboracao;
	}
	 


}
?>
