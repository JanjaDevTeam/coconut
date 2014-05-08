<h4><?=$data['nomeProjeto']?></h4>
<?php if (isset($data['box']) && $data['box'] == 1): ?>
	<br/>
<div class='aviso-verde'>Atualizado com sucesso.</div>
<?php endif ?>

<?php if (isset($data['erro'])): ?>
	<br/>
<div class='aviso-vermelho'><?=$data['erro']?>.</div>
<?php endif ?>

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
				<a href='editar_colab.php?id=<?=$colab['id']?>'><li>Editar</li></a>
				<a href='excluir_colab.php?id=<?=$colab['id']?>'><li>Deletar</li></a>
			</ul>
		</div>
	</div>
<?php } ?>
</div>
