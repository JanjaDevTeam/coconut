<!DOCTYPE html>

<html lang="pt-br">
<head>
	<title>Coconut by JanjaDevTeam</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/janja.css"/>
	<script src="lib/janja.js"></script>
</head>

<body>
<div class='wrapper bbox'>
<div id='top-borda' class='container-100'></div>
<div class='container-80 principal'>
	
	<div id='logo-menu'>
		<div id='logo'class='col-1-3 bbox'><a href='index.php'><img src='img/solucionatica.png' class='logo' alt='Solucionática'/></a></div>
		<!-- main menu -->
		<?php Janja::loadContent('main_menu', $data); ?>
	</div>
	<div id='principal'>
	<!-- content -->
	<?php
	if (isset($content) and $content != '') {
		Janja::loadContent($content, $data);
	}
	?>
	</div>
	
</div>

<?php
require_once('view/template/footer.php');
?>
</div>

</body>
</html>
