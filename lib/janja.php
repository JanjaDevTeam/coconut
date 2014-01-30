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
	
}
?>
