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
		
		// dados do usuário que criou o projeto
		$user = $db->getUser($proj->getIdUser());
		$nome = $user->getFullname();
		$nome = explode(' ', $nome);
		$nome = $nome[0];		
		// calcula quantas colaborações foram compradas
		$backers = 0;
		foreach ($colaboracao as $col) {
			$backers += $col['qtdComprada'];
		}
		$proj->setColaboracao($colaboracao);
		
		// id do video para embed
		$exp = explode('?v=', $proj->getVideo());
		$videoId = explode("&", $exp[1]);
		$data['videoId'] = $videoId[0];
		
		$data['backers'] = $backers;
		$data['projeto'] = $proj;
		$data['diasRestantes'] = $proj->getDiasRestantes();
		$data['idProponente'] = $user->getId();
		$data['proponente'] = $nome;
		$data['pct'] = $proj->getPorcentagem();
		$data['categoria'] = $proj->getCategoria();
		$data['prazo'] = $proj->getPrazo();

		// foto
		$fotoPath = "img/userpics/" . $user->getId() . ".jpg";
		if (file_exists($fotoPath)) {
			$data['foto'] = $fotoPath;
		} else {
			$data['foto'] = "img/user.jpg";
		}
		
		
		return $data;
	}

	public function validarProjeto($proj) {
		$erros = array();
		// verifica campos em branco
		if($proj->getNome() == "") { $erros[] = "nome"; }
		if($proj->getIdCategoria() == "") {$erros[] = "categoria";}
		if($proj->getDescricao()=="") {$erros[] = "descrição";}
		if($proj->getFrase()=="") {$erros[] = "frase";}
		if($proj->getValor()=="") { $erros[] = "valor";}
		if($proj->getPrazo()=="") {$erros[] = "prazo";}
		if($proj->getVideo()=="") {$erros[] = "video";}
		if($proj->getLinks()=="") {$erros[] = "links";}

		return (sizeof($erros) == 0) ? True : $erros; 
	}
}

?>
