<p>Deseja mesmo ativar o projeto <?=$data['nome']?>? </p>
<br/>
<form action="adm_ativar_proj.php" method="post">
	<input type="hidden" name="id" value="<?=$data['id']?>"/>
	<input type="hidden" name="action" value="ativar"/>
	<button class='botao'>ATIVAR</button>
</form>