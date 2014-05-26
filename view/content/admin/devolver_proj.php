<p>Deseja mesmo devolver o projeto <?=$data['nome']?>? </p>
<br/>
<form action="adm_devolver_proj.php" method="post">
	<input type="hidden" name="id" value="<?=$data['id']?>"/>
	<input type="hidden" name="action" value="devolver"/>
	<button class='botao'>DEVOLVER PROJETO</button>
</form>