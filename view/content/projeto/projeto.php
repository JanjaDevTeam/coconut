<h4><?=$data['nome']?></h4>
<br/>
<div class='col-2-3'>
	<div class='youtubeVideo'>
		<iframe src="//www.youtube.com/embed/<?=$data['videoId']?>" frameborder="0" allowfullscreen></iframe>
	</div>
	<p><?=$data['descricao']?></p>
</div>


<div id="projetoQuadro" class='col-1-3 bbox pad-3'>
	<h3><?=$data['backers']?></h3>
	<p><strong>colaboradores</strong></p>
	<h3>R$<?=$data['valorArrecadado']?></h3>
	<p><strong>arrecadado de R$<?=$data['valor']?></strong></p>
	<h3><?=$data['diasRestantes']?></h3>
	<p><strong>dias restando</strong></p>

	<div id='barra-container'>
		<div id='barra' style="width: 15%"></div>
	</div>

</div>
<div class='clear-b'>&nbsp;</div>
