<h4><?=$data['nomeProjeto']?></h4>


<div class="col-1-3 aviso-projeto bbox">
	<form action="" method="post" class='form-stacked'>
		<label>Valor</label>
		<input type="text" value="<?=$data['valor']?>" />
		<br/>
		<label>Descrição</label>
		<textarea><?=$data['descricao']?></textarea>
		<br/><br/>
		<label>Quantidade: (0 para ilimitada)</label>
		<input type="text" value="<?=$data['qtdTotal']?>"/>
		<br/>
		<button class='botao'>Salvar</button>
	</form>
	<br/>
	<a href="javascript:history.go(-1)">Voltar</a>
</div>
<div class="col-2-3 bbox pad-5">
	<p><strong>Regras para alteração:</strong> onono on on o no nonon on on o nono no no 
</div>
<div class='clear-b'></div>
