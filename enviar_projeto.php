<?php
require_once('lib/janja.php');
session_start();

$data['selecionado'] = 'enviar';

if(isset($_SESSION['userId'])) {
	Janja::loadTemplate('main', 'projeto/enviar_projeto', $data);
} else {
	Janja::loadTemplate('main', 'apenas_logado', $data);
}
?>
