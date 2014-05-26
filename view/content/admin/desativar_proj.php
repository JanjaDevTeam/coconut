<p>Deseja mesmo desativar o projeto <?=$data['nome']?>? </p>
<br/>
<form action="adm_desativar_proj.php" method="post">
	<input type="hidden" name="id" value="<?=$data['id']?>"/>
	<input type="hidden" name="action" value="ativar"/>
	<button class='botao'>DESATIVAR</button>
</form>