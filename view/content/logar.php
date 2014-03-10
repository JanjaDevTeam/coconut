<div class='container-100 bbox'>
	<h4 class='text-c'>Logar</h4>
	
	
	
	<br/>
	<div class='col-1-3'>&nbsp;</div>
	<div class='login pad-2 bbox col-1-3'>
		<?php if(isset($_GET['action']) and ($_GET['action'] == 'erro')) { ?>
		<div class='aviso-vermelho bbox'>
		Erro tentando logar.
		</div>
		<?php } ?>
		<?php require_once('lib/fbconfig.php'); ?>
		<form action='logar_form.php' method='POST' class="form-stacked">
		
			<a href="<?php echo $loginUrl; ?>"><img src='img/facebook.jpg' alt='Facebook' class='text-c'/></a>
			<label for="email">Email</label>
			<input id="email" name='email' type="email" placeholder="Email" required>

			<label for="senha">Password</label>
			<input id="senha" name='senha' type="password" placeholder="Senha" required>


			<button type="submit" class="pure-button pure-button-primary">Entrar</button>
			
		
		</form>
		<div class='text-c'>
		<a href='#'>Esqueceu sua senha? Clique aqui.</a>
		</div>
		
	</div>
	<div class='col-1-3'>&nbsp;</div>
	
</div>
<br/><br/><br/>
