<!DOCTYPE html>

<html lang="pt-br">
<head>
	<title>Solucionática - Área Administrativa</title>
	<meta charset="utf-8"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/admin.css"/>
</head>
	
	

	<div id="contentColumn">
		<div id="menuColumn">
		<div id="titulo">
			<h2>Solucionática</h2>
		</div>
		<div id="menu">
			<ul>
				<?=Janja::menuAdmin($data['menuAtivo']) ?>
			</ul>
		</div>	
	</div>
		<div id="topMsg"><div class='container'><p>Seja bem vindo, <?=$data['username']?>. &nbsp; (<a href="logout.php" alt="logout" >logout</a>)</p></div></div>

		<div class='container'>
				<?php 
					if($content != "") {
						Janja::loadContent($content, $data); 
					}
				?>

		</div>
	</div>


<body>
</body>
</html>
