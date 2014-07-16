<?php
// se logado, carrega a foto
if (isset($_SESSION['userId']) && $_SESSION['userId'] != Null) {
	if (isset($_SESSION['fbId']) && $_SESSION['fbId'] != Null) {
		$FOTO_PATH = "img/userpics/" . $_SESSION['userId'] . ".jpg";
	} else {
		$FOTO_PATH = "img/user.jpg";
	}
}

?>

<div class='col-2-3 text-r' id='menu'>
			<?php if (isset($_SESSION['userId'])) { ?><div class='col-5-6'><?php } ?>
			<ul>
				<?php if ($data['selecionado'] == 'explorar') : ?>
				<li class='selecionado'><strong>EXPLORAR</strong></li>
				<?php else : ?>
				<li><a href='explorar.php'><strong>EXPLORAR</strong></a></li>
				<?php endif; ?>
				
				<?php if ($data['selecionado'] == 'enviar') : ?>
				<li class='selecionado'><strong>ENVIAR PROJETO</strong></li>
				<?php else : ?>
				<li><a href='enviar_projeto.php'><strong>ENVIAR PROJETO</strong></a></li>
				<?php endif; ?>
				
				
				
				<?php 
				if (isset($_SESSION['userId'])) { ?>
					<li><a href='logout.php'><strong>LOGOUT</strong></a></li>
				
				<?php } else {
				?>
				<?php if ($data['selecionado'] == 'logar') : ?>
				<li class='selecionado'><strong>LOGAR</strong></li>
				<?php else : ?>
				<li><a href='logar.php'><strong>LOGAR</strong></a></li>
				<?php endif; ?>
				
				<?php } ?>
				
			</ul>
			<?php if (isset($_SESSION['userId'])) { ?></div><div class='col-1-6 text-c'><? } ?>
			<?php if (isset($_SESSION['userId'])) { ?>
			<a href='perfil.php?id=<?=$_SESSION['userId']?>'><img src="<?=$FOTO_PATH?>" title='<?=$_SESSION['userName']?>' class='fb-pic'></a>
			<?php } ?>
			
			
			<?php if (isset($_SESSION['userId'])) { ?></div><? } ?>
		</div>
