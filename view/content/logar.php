<div class='container-100 bbox'>
	<h4 class='text-c'>Logar</h4>
	<br/>
	<div class='col-1-3'>&nbsp;</div>
	<div class='login pad-2 bbox col-1-3'>
		<?php require_once('lib/fbconfig.php'); ?>
		<form class="form-stacked">
		
			<a href="<?php echo $loginUrl; ?>"><img src='img/facebook.jpg' alt='Facebook' class='text-c'/></a>
			<label for="email">Email</label>
			<input id="email" type="email" placeholder="Email">

			<label for="password">Password</label>
			<input id="password" type="password" placeholder="Password">


			<button type="submit" class="pure-button pure-button-primary">Sign in</button>
			
		
		</form>
		<div class='text-c'>
		<a href='#'>Esqueceu sua senha? Clique aqui.</a>
		</div>
		
	</div>
	<div class='col-1-3'>&nbsp;</div>
	
</div>
<br/><br/><br/>
