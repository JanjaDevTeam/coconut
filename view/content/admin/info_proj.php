<h2>Informações sobre o projeto</h2>

<br/>
<p><strong><?=$data['nome']?></strong></p>
<br/>

<p><strong>Proponente:</strong></p>
<p><?=$data['owner']?></p>
<br/>

<p><strong>Email:</strong></p>
<p><?=$data['email']?></p>
<br/>

<p><strong>Dias restantes:</strong></p>
<p><?=$data['diasRestantes']?>/<?=$data['prazo']?></p>
<br/>

<p><strong>Já financiado:</strong></p>
<p><?=$data['pct']?>%</p>
<br/>

<p><strong>Status do projeto:</strong></p>
<p><?=$data['ativo']?> 
	<?php
	if ($data['ativo'] == "ativo") {
		echo " / " . $data['analise'];
	}

	?></p>
	<br/>
<?php if($data['projAnalise'] == 1 && $data['projAtivo'] == 0): ?>
	<a href="adm_ativar_proj.php?id=<?=$data['id']?>">Clique para ativar o projeto</a><br/><br/>
	<a href="adm_devolver_proj.php?id=<?=$data['id']?>">Clique para devolver o projeto</a>
<?php endif; ?>

<?php if($data['projAtivo'] == 1): ?>
	<a href="adm_desativar_proj.php?id=<?=$data['id']?>">Clique para desativar o projeto</a><br/><br/>
<?php endif; ?>