<!DOCTYPE html>

<html lang="pt-br">
<head>
	<title>Solucionática - Área administrativa</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/admin.css"/>
</head>
<body>
<div id="topbar" class='col_1 bbox'>
	<div class='col_1_2 bbox' id="logo"><h1>Solucionática</h1></div>
	<div class='col_1_2 bbox' id="usuario">
	<?php
		echo $_SESSION['user']['fbfullname'] . "&nbsp;&nbsp; - &nbsp;&nbsp;<a href='logout.php'>(Sair)</a>";
	?>
	</div>
</div>
<div class="col_1_4 bbox menu" id="menu">
	<ul>
		<li><a href="adm_projetos_abertos.php">Projetos em aberto (<?=$data['qtdAbertos']?>)</a></li>
		<li><a href="adm_projetos_ativos.php">Projetos ativos (<?=$data['qtdAtivos']?>)</a></li>
	</ul>
</div>
<div class='col_3_4 bbox' id="content">
<?php 
	if($content != "") {
		Janja::loadContent($content, $data); 
	}
?>
</div>

</body>
</html>
