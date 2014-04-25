<?php
require_once("model/database.php");

/*

$data['idTransacao']     = $_POST['id_transacao'];
$data['valor']           = $_POST['valor'];
$data['statusPagamento'] = $_POST['status_pagamento'];
$data['codMoip']         = $_POST['cod_moip'];
$data['formaPagamento']  = $_POST['forma_pagamento'];
$data['tipoPagamento']   = $_POST['tipo_pagamento'];
$data['emailConsumidor'] = $_POST['email_consumidor'];
*/

$data['idTransacao'] = md5('janja');
$data['valor'] = 1200;
$data['statusPagamento'] = 2;
$data['codMoip'] = md5('janja');
$data['formaPagamento'] = 1;
$data['tipoPagamento'] = 'CartaoDeCredito';
$data['emailConsumidor'] = 'pagador@email.com.br';

$db = new Database;
$db->insertMoipNasp($data);
?>