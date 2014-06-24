<div class="clearb"/>
<h2>Ativar projeto</h2>
<div id="quadro1" class="quadro">
	<div class="quadroTitulo bgLaranja bordaTop"><h4>Confirmação</h4></div>
	<div class="quadroContent container">
		<p>Deseja mesmo <strong>ativar</strong> o projeto <?=$data['nome']?>? </p>
	</div>
</div>


<br/>
<form action="adm_ativar_proj.php" method="post">
	<input type="hidden" name="id" value="<?=$data['id']?>"/>
	<input type="hidden" name="action" value="ativar"/>
	<div class="direita">
		<button class='botao'>ATIVAR</button>
	</div>
</form>