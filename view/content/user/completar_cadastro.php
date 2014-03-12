<h4>Completar Cadastro</h4>
<p>Seja bem vindo, <strong><?= $_SESSION['fb']['fbfullname']?></strong>.</p>
<p>Para completar seu cadastro defina uma senha.</p>
<p>Você receberá um email para ativar seu cadastro.</p>

<div class='container-100'>
	<div class='col-1-3'>
		<?php if(isset($data['erro'])) { ?>
		<div class='aviso-vermelho'><?=$data['erro']?></div>
		<?php } ?>
		<form action='completar_cadastro.php' method='POST' class="form-stacked">
		
			<label for="senha">Senha</label>
			<input id="senha" name='senha' type="password" placeholder="Senha" required>

			<label for="senha2">Confirmar Senha</label>
			<input id="senha2" name='senha2' type="password" placeholder="Confirmar senha" required>


			<button type="submit">Registrar</button>
			
		
		</form>
	</div>
	<div class='col-1-3'>&nbsp;</div>
	<div class='col-1-3'>&nbsp;</div>
</div>