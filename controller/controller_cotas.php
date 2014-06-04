<?php
class ControllerCotas {
	public function  comprarCotas($idUser, $idColab, $seed) {
		$db = new Database;
		$db->saveUserColaboracao($idUser, $idColab, $seed);
	}
}

?>