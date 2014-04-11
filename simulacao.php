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
$user->setFbid(1638708531);
$user->setFbuname('brunocanongia');
$user->setFbfullname('Bruno at Janja');
$user->setFbemail('bruno@janjadev.com');
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
$projeto->setNome('Projeto NEO GEO - Simulação');
$projeto->setDescricao('Neo Geo é um sistema de jogos para arcade e consoles lançado em 1990 pela empresa japonesa de jogos SNK. Para a época apresentava gráficos coloridos e bem detalhados além de áudio de alta qualidade. Inicialmente vendido com um sistema para arcades, depois foi vendido em versão doméstica. As duas versões são conhecidas como MVS (Multi Video System, para arcade) e AES (Advanced Entertainment System, sistema de entretenimento avançado, versão doméstica). 
<br/><br/>O AES surgiu após o sucesso da placa MVS nos arcades japoneses, sendo nada mais que o mesmo hardware com um formato adaptado para um console doméstico, fazendo com que os jogos caseiros fossem exatamente iguais aos jogados nos arcades.

Apesar dessa vantagem, todo sistema de hardware era voltado para a exploração profissional de jogos e contava com recursos gráficos avançados ainda caros para o usuário final. O seu preço era extremamente alto em comparação aos outros videogames da época: U$650, e os cartuchos passavam dos U$200 (o preço de um Sega Genesis).

O sistema de cartão de memória permitia que se guardassem os recordes e estados do jogo sendo compatível com muitos arcades também nos EUA.

<br/><br/> O console sempre foi reconhecido pela qualidade de seus jogos, em especial os de plataforma como Metal Slug e principalmente os de luta: The King of Fighters, Fatal Fury e Samurai Shodown moviam multidões aos fliperamas do mundo e são jogados até hoje.

No Brasil, seu lançamento oficial ocorreu em julho de 1993, com a importação do modelo pela empresa Tron. Disponibilizado inicialmente por 750 dólares, era montado em Manaus.1

Ao contrário do que normalmente acontece no mundo do entretenimento digital, onde os consoles duram poucos anos, o Neo Geo e sua versão arcade MVS duraram anos no mercado e depois de mais de 20 anos ainda movimentam um mercado de colecionadores e jogadores.');
$projeto->setFrase('Rodando a simulação.');
$projeto->setValor(2000);
$projeto->setPrazo(30);
$projeto->setValorArrecadado(600);
$projeto->setVideo('http://www.youtube.com/watch?v=5BQHq4s_qHo');
#$projeto->setLinks('www.janjadev.com, www.luzsollar.com, www.google.com');
$projeto->setAtivo(1);

$db->saveProjeto($projeto);

Janja::Debug($projeto);

echo "<span style='color: red'>criando colaborações do projeto 1</span>";
// colaboracao 1
$colaboracao = new Colaboracao;
$colaboracao->setIdProjeto(1);
$colaboracao->setValor(15.00);
$colaboracao->setDescricao('Uma cópia do projeto');
$colaboracao->setQtdTotal(0);
$colaboracao->setQtdComprada(0);
$colaboracao = $db->saveColaboracao($colaboracao);
Janja::Debug($colaboracao);

$colaboracao = new Colaboracao;
$colaboracao->setIdProjeto(1);
$colaboracao->setValor(200.00);
$colaboracao->setDescricao('Além da cópia você também ganhará um protótipo para testes.');
$colaboracao->setQtdTotal(5);
$colaboracao->setQtdComprada(3);
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
