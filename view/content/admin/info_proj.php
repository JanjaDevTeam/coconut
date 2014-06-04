<h4>INFORMAÇÕES DO PROJETO</H4>

<br/>
<p><strong><?=$data['nome']?></strong></p>
<p><?=$data['owner']?></p>
<p><?=$data['email']?></p>
<p>Dias restantes: <?=$data['diasRestantes']?>/<?=$data['prazo']?></p>
<p>Já financiado: <?=$data['pct']?>%</p>
<br/>
<p>Status do projeto: &nbsp;<?=$data['ativo']?> 
	<?php
	if ($data['ativo'] == "ativo") {
		echo " / " . $data['analise'];
	}

	?></p>
<?php if($data['projAnalise'] == 1 && $data['projAtivo'] == 0): ?>
	<a href="adm_ativar_proj.php?id=<?=$data['id']?>">Clique para ativar o projeto</a><br/><br/>
	<a href="adm_devolver_proj.php?id=<?=$data['id']?>">Clique para devolver o projeto</a>
<?php endif; ?>

<?php if($data['projAtivo'] == 1): ?>
	<a href="adm_desativar_proj.php?id=<?=$data['id']?>">Clique para desativar o projeto</a><br/><br/>
<?php endif; ?>