<div class='container-100 bbox'>
	<h4 class='text-c'>Redefinir Senha</h4>
	<br/>
	<p class="text-c">Será enviado um link para o seu email com as instruções para redefinir sua senha.</p>
	<div class='col-1-3'>&nbsp;</div>
	<div class='col-1-3'>
		
		<?php if(isset($_GET['erro']) and ($_GET['erro'] == 'snb')) { ?>
		<div class='aviso-vermelho bbox'>
		As senhas não batem.
		</div>
		<?php } ?>
		
		<form class="form-stacked" method="post" action="nova_senha.php">
			<label>Email:</label>
			<input type="text" name="email"/>
			<input type="submit" value="Enviar" class="botao"/>
		</form>

	</div>
	<div class='col-1-3'>&nbsp;</div>
	
	
</div>

