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

	static function emailSenha($email, $token) {
		$assunto = "[Coconut] Redefinir senha";

		$msg = "Bem vindo à Solucionática\n\n" .
		"Para redefinir sua senha clique aqui: \n" .
		"http://localhost/coconut/nova_senha.php?t=$token" .
		"\n\nEste link é válido por 24 horas.";

		mail ( $email , $assunto , $msg );

	}
}
?>