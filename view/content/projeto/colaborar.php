<h4><?=$data['projeto']['nome']?></h4>
<br/><br/>
<h4>Para R$<?=$data['colab']['valor']?></h4>

<p><?=$data['colab']['descricao']?>

<?php if ($data['colab']['qtdTotal'] == 0) { ?>
	<p><strong>Colaboradores: <?=$data['colab']['qtdComprada']?></strong></p>
<?php } else { ?>
	<p><strong>Colaboradores: <?=$data['colab']['qtdComprada']?> de <?=$data['colab']['qtdTotal']?> - limitada</strong></p>
<?php } ?>
<br/>
<br/>
<form action='colaborar_moip.php' method='post'>
	<input type="hidden" name="id" value="<?=$data['colab']['id']?>">
	<button class='botao'>COLABORAR</button>
</form>