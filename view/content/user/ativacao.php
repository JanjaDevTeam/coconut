<h4>Ative o seu cadastro</h4>
<p>Coloque o token recebido por email.</p>

<div class='container-100'>
	<div class='col-1-3'>
		<?php if(isset($data['erro'])) { ?>
		<div class='aviso-vermelho'><?=$data['erro']?></div>
		<?php } ?>
		<form action='ativacao.php' method='POST' class="form-stacked">
		
			<label for="token">Token</label>
			<input id="token" name='token' type="text" placeholder="Token" required>

			<button type="submit">Ativar</button>
			
		
		</form>
	</div>
	<div class='col-1-3'>&nbsp;</div>
	<div class='col-1-3'>&nbsp;</div>
</div>