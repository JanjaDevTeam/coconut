<?php
class Janja {
	static function debug($target) {
		echo "<pre>";
		print_r($target);
		echo "</pre>";
	}
	
	static function dump($target) {
		echo "<pre>";
		var_dump($target);
		echo "</pre>";
	}
	
	static function loadTemplate($template, $content='', $data='') {
		require_once('view/template/' . $template . '.php');
	}
	
	static function loadContent($content, $data='') {
		require_once('view/content/' . $content . '.php');
	}

	static function statusMoip($i) {
		$msg = "";
		switch ($i) {
			case 1: 
				$msg = "autorizado";
				break;
			case 2: 
				$msg = "iniciado";
				break;
			case 3: 
				$msg = "boleto impresso";
				break;
			case 4: 
				$msg = "concluido";
				break;
			case 5: 
				$msg = "cancelado";
				break;
			case 6: 
				$msg = "em análise";
				break;
			case 7: 
				$msg = "estornado";
				break;
			case 8: 
				$msg = "em revisão";
				break;
			case 9: 
				$msg = "reembolsado";
				break;
		}

		return $msg;
	}

	
	
}
?>
