<h4><?=$data['nome']?></h4>
<p><strong><?=$data['categoria']?></strong></p>
<br/>
<div class='col-2-3'>
	<div class='youtubeVideo'>
		<iframe src="//www.youtube.com/embed/<?=$data['videoId']?>" frameborder="0" allowfullscreen></iframe>
	</div>
	
	<p><?=$data['descricao']?></p>
	
</div>






<div class='col-1-3 bbox pad-3'>
	<div id="projetoQuadro">
		<h3><?=$data['backers']?></h3>
		<p><strong>colaboradores</strong></p>
		<h3>R$<?=$data['valorArrecadado']?></h3>
		<p><strong>arrecadados de R$<?=$data['valor']?> (<?=$data['pct']?>%)</strong></p>
		<div id='barra-container'>
			<div id='barra' style="width: <?=$data['pct']?>%"></div>
		</div>
		<br/>
		<h3><?=$data['diasRestantes']?></h3>
		<p><strong>dias restando</strong></p>

	</div>
	<br/>
	<br/>
	
	
	<div id="proponenteQuadro" class='bbox'>
		<div class='col-1-3'>
			<a href='perfil.php?id=<?=$data['idProponente']?>'><img src="img/userpics/<?=$data['idProponente']?>.jpg"/></a>
		</div>
		
		<div class='col-2-3'>
			Projeto por: <br/>
			<p><strong><a href='perfil.php?id=<?=$data['idProponente']?>'><?=$data['proponente']?></a></strong></p>
		</div>
	</div>
	<div class='clear-b'></div>
	
	
	<div id="colaboracao">
	<?php foreach ($data['colaboracao'] as $colab) { ?>
	<div class='colaboracaoQuadro bbox'>
		<h4>Para R$<?=$colab['valor']?></h4>
		<?php if ($colab['qtdTotal'] == 0) { ?>
			<p><strong>Colaboradores: <?=$colab['qtdComprada']?></strong></p>
		<?php } else { ?>
			<p><strong>Colaboradores: <?=$colab['qtdComprada']?> de <?=$colab['qtdTotal']?> - limitada</strong></p>
		<?php } ?>
	<span><?=$colab['descricao']?></span>
	<br/><a href='colaborar.php?id=<?=$colab['id']?>'>Clique aqui</a>
	</div>
	<?php } ?>
	</div>
</div>
<div class='clear-b'>&nbsp;</div>
