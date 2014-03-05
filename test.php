<?php
require_once('model/user.php');
require_once('model/database.php');
require_once('lib/janja.php');

$db = new Database;
$user = new User;

$result = $db->getCotasByProject(1);

$total = 00.00;
foreach($result as $cota) {
	$total += $cota['valor'] * $cota['vendidas'];
}
$result['total'] = $total;

$valor_do_projeto = 15250.00;

$financiado = ($result['total'] / $valor_do_projeto) * 100;
$financiado = round($financiado);
Janja::Debug($result);
echo '<br/>Financiado: ' . $financiado . '%';
?>
