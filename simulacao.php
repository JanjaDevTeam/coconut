<?php
require_once('model/database.php');
require_once('model/user.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');
require_once('lib/janja.php');



?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
	<title>Coconut by JanjaDevTeam</title>
	<meta charset="utf-8"/>
</head>
<body>

<?php
echo 'SIMULACAO';


$db = new Database;

// tsunami
$handle = fopen ("db/schema.sql","r");
$sql = file_get_contents("db/schema.sql");
fclose($handle);

$stmt = $db->prepare($sql);
$stmt->execute();

echo '<br/><br/><br/>TSUNAMI<br/><br/><br/>';
sleep(1);
// cria usuário 1
echo "<span style='color: red'>criando usuário</span>";
// recria db após tsunami
$db = new Database;

$agora = date("Y-m-d H:i:s");
$user = new User;
$user->setFbid(123456);
$user->setFbuname('uteste');
$user->setFbfullname('Usuário Teste');
$user->setFbemail('testuser@localhost.com');
$user->setAtivo(1);
$user->setDataRegistro($agora);
$user->setDataAcesso($agora);
$user = $db->saveUser($user);

Janja::Debug($user);


echo "<span style='color: red'>criando projeto</span>";
$projeto = new Projeto;

$projeto->setIdUser(1);
$projeto->setIdCategoria(1);
$projeto->setNome('Simulação');
$projeto->setDescricao('Simulação do sistema de crowd funding');
$projeto->setFrase('Rodando a simulação.');
$projeto->setValor(15500.90);
$projeto->setPrazo(30);
$projeto->setVideo('http://www.youtube.com/watch?v=5BQHq4s_qHo');
$projeto->setAtivo(1);

$db->saveProjeto($projeto);

Janja::Debug($projeto);

echo "<span style='color: red'>agregando faixas de colaboração aos projetos</span>";
// colaboracao 1
$colaboracao = new Colaboracao;
$colaboracao->setIdProjeto(1);
$colaboracao->setValor(15.00);
$colaboracao->setDescricao('contrapartida 1');
$colaboracao->setQtdTotal(0);
$colaboracao->setQtdComprada(0);
$colaboracao = $db->saveColaboracao($colaboracao);
Janja::Debug($colaboracao);

$colaboracao = new Colaboracao;
$colaboracao->setIdProjeto(1);
$colaboracao->setValor(200.00);
$colaboracao->setDescricao('contrapartida 2 - limitada');
$colaboracao->setQtdTotal(5);
$colaboracao->setQtdComprada(0);
$colaboracao = $db->saveColaboracao($colaboracao);
Janja::Debug($colaboracao);
?>
<br/><br/><br/><br/>
</body>
</html>