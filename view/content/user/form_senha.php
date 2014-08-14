<h4 class='text-c'>Redefinir senha</h4>

<div class='container-60'>
	<?php if (isset($data['erro'])) { ?>
	<br/>
		<div class='aviso-vermelho'>
		<?php foreach($data['erro'] as $erro) { echo "$erro<br/>"; } ?>
		</div>
		

	<?php } ?>
	<form name='registro' action='nova_senha.php' method='post' class='form-stacked pad-3' onsubmit="return validateFormSenha();">
		
		<label for="senha">SENHA</label>
		<input type='password' name='senha' required/>
		
		<label for="senha2">CONFIRMAR SENHA</label>
		<input type='password' name='senha2' required/>
		
		<input type="hidden" name="token" value="<?=$data['token']?>">
		<div class='text-c'>
			<button type='submit' class="botao">Redefinir</button>
		</div>
	</form>
</div>

<br/><br/>
