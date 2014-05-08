<h4><?=$data['nomeProjeto']?></h4>


<div class="col-1-3 aviso-projeto bbox">
	<form action="editar_colab.php" method="post" class='form-stacked'>
		<input type="hidden" name="idColab" value="<?=$data['idColab']?>">
		<label>Valor</label>
		<input name="valor" type="text" value="<?=$data['valor']?>" />
		<br/>
		<label>Descrição</label>
		<textarea name="descricao"><?=$data['descricao']?></textarea>
		<br/><br/>
		<label>Quantidade: (0 para ilimitada)</label>
		<input type="text" name="qtdTotal" value="<?=$data['qtdTotal']?>"/>
		<br/>
		<button class='botao'>Salvar</button>
	</form>
	<br/>
	<a href="colaboracao.php?id=<?=$data['idProjeto']?>">Voltar</a>
</div>
<div class="col-2-3 bbox pad-5">
	<p><strong>Regras para alteração:</strong> onono on on o no nonon on on o nono no no 
</div>
<div class='clear-b'></div>