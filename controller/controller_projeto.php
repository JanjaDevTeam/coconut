<?php

require_once('model/user.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');
require_once('model/database.php');
require_once('lib/janja.php');

class ControllerProjeto {
	public function getProjetoCompleto($id) {
		$db   = new Database;
		$proj = $db->getProjeto($id);
		$colaboracao = $db->getColaboracaoByProjeto($id);
		
		// calcula quantas colaborações foram compradas
		$backers = 0;
		foreach ($colaboracao as $col) {
			$backers += $col['qtdComprada'];
		}
		$proj->setColaboracao = $colaboracao;
		
		// calcula número de dias restantes
		$agora = date("Y-m-d H:i:s");
		$segundosPassados = strtotime($agora) - strtotime($proj->getDataRegistro());
		$diasPassados = $segundosPassados / 86400;
		$prazo = $proj->getPrazo();
		$diasRestantes = floor($prazo - $diasPassados) + 1;
		
		// id do video para embed
		$exp = explode('?v=', $proj->getVideo());
		$data['videoId'] = $exp[1];
		
		$data['backers'] = $backers;
		$data['projeto'] = $proj;
		$data['diasRestantes'] = $diasRestantes;
		
		
		return $data;
	}
}

?>
