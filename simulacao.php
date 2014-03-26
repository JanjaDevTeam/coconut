<?php
require_once('model/database.php');
require_once('model/user.php');
require_once('model/projeto.php');
require_once('model/colaboracao.php');
require_once('model/user_colaboracao.php');
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
echo "<span style='color: red'>criando usuário 1</span>";
// recria db após tsunami
$db = new Database;

$agora = date("Y-m-d H:i:s");
$user = new User;
$user->setFbid(123456);
$user->setFbuname('uteste');
$user->setFbfullname('Usuário Teste');
$user->setFbemail('testuser@localhost.com');
$user->setDataRegistro($agora);
$user->setDataAcesso($agora);
$user = $db->saveUser($user);
Janja::Debug($user);

echo "<span style='color: red'>criando usuário 2</span>";
// recria db após tsunami
$db = new Database;

$agora = date("Y-m-d H:i:s");
$user = new User;
$user->setFbid(123456);
$user->setFbuname('mirolha');
$user->setFbfullname('John Mirolha');
$user->setFbemail('johnmirolha@localhost.com');
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

echo "<span style='color: red'>criando colaborações do projeto 1</span>";
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

echo "<span style='color: red'>carregando projeto 1 e suas colaborações.</span>";
$projeto = $db->getProjeto(1);
Janja::Debug($projeto);

echo "<span style='color: red'>usuário 2 colabora com colaboracao 1.</span>";
$db->saveUserColaboracao(2, 1, 3);
echo "<br/><span style='color: red'>ok</span>";
echo "<br/><span style='color: red'>busca colaboracao 1.</span>";
$colaboracao = $db->getUserColaboracao(1);
Janja::Debug($colaboracao);




?>
<br/><br/><br/><br/>
</body>
</html>