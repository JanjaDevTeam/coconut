<div class='container-100 bbox'>
	<h4 class='text-c'>Logar</h4>
	<div class='col-1-3'>&nbsp;</div>
	<div class='col-1-3'>
		
		<?php if(isset($_GET['action']) and ($_GET['action'] == 'erro')) { ?>
		<div class='aviso-vermelho bbox'>
		Erro tentando logar.
		</div>
		<?php } ?>
		
		<form class="form-stacked" method="post" action="logar.php">
			<label>Email:</label>
			<input type="text" name="email"/>
			<label>Password:</label>
			<input type="password" name="password"/>
			<input type="submit" value="Logar" class="botao"/>
			<div class='esqueci-senha'><a href="#" class="esqueci-senha">(esqueci minha senha)</a></div>
		</form>
		<hr/>
		<?php require_once('lib/fbconfig.php'); ?>
		<a href="<?php echo $loginUrl; ?>"><img src='img/facebook.jpg' alt='Facebook' class='text-c fb-button'/></a>
	</div>
	<div class='col-1-3'>&nbsp;</div>
	
	
	
	<!--
	<br/>
	<div class='col-1-3'>&nbsp;</div>
	<div class='login pad-2 bbox col-1-3'>
		<?php if(isset($_GET['action']) and ($_GET['action'] == 'erro')) { ?>
		<div class='aviso-vermelho bbox'>
		Erro tentando logar.
		</div>
		<?php } ?>
		<?php require_once('lib/fbconfig.php'); ?>
			<a href="<?php echo $loginUrl; ?>"><img src='img/facebook.jpg' alt='Facebook' class='text-c'/></a>
	</div>
	<div class='col-1-3'>&nbsp;</div>
	-->
</div>

