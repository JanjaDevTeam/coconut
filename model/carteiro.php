<?php
class Carteiro {
	static function emailCadastro($email, $token) {
		$assunto = "[Coconut] Bem vindo!";

		$msg = "Bem vindo à Solucionática\n\n" .
		"Para completar seu cadastro clique aqui: \n" .
		"http://localhost/coconut/ativar.php?t=$token" .
		"\n\nEste link é válido por 24 horas.";

		mail ( $email , $assunto , $msg );

	}
}
?>