<h4><?=$data['nomeProjeto']?></h4>
<div id="colaboracao">
	<?php foreach ($data['colaboracao'] as $colab) { ?>
		<div class='colaboracaoQuadro bbox'>
			<h4>Para R$<?=$colab['valor']?></h4>
			<?php if ($colab['qtdTotal'] == 0) { ?>
				<p><strong>Colaboração ilimitada</strong></p>
			<?php } else { ?>
				<p><strong>Colaboração <?=$colab['qtdTotal']?> - limitada</strong></p>
			<?php } ?>
		<span><?=$colab['descricao']?></span>
		<div class='pilula'>
			<ul>
				<a href='#'><li>Editar</li></a>
				<a href='#'><li>Deletar</li></a>
			</ul>
		</div>
	</div>
<?php } ?>
</div>
