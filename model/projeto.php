<?php
class Projeto {
	
	private $id;
	private $proponente; # obj
	private $idProponente;
	private $idCategoria;
	private $categoria;
	
	public function __construct() {
		//echo "Hello projeto\n";
	}
	
	# setters
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setProponente($prop) {
		$this->proponente = $prop;
	}
	
	public function setIdProponente($id) {
		$this->idProponente = $id;
	}
	
	public function setIdCategoria($id) {
		$this->idCategoria = $id;
	}
	
	public function setCategoria($cat) {
		$this->categoria = $categoria;
	}

	
	# getters
	public function getId() {
		return $this->id;
	}
	
	public function getProponente() {
		return $this->proponente;
	}
	
	public function getIdCategoria() {
		return $this->idCategoria;
	}
	
	public function getCategoria() {
		return $this->Categoria;
	}
}
?>
