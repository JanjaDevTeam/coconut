<h4>Excluir colaboração</h4>
<p>Deseja mesmo excluir a seguinte colaboração?</p>

<div id="colaboracao">
	<div class='colaboracaoQuadro bbox'>
		<h4>Para R$<?=$data['valor']?></h4>
		<?php if ($data['qtdTotal'] == 0) { ?>
				<p><strong>Colaboração ilimitada</strong></p>
			<?php } else { ?>
				<p><strong>Colaboração <?=$data['qtdTotal']?> - limitada</strong></p>
			<?php } ?>
		<span><?=$data['descricao']?></span>
		<div class='pilula'>
			<ul>
				<a href='excluir_colab.php?id=1&action=1'><li>Sim. Quero apagar!</li></a>
			</ul>
		</div>
	</div>
</div>

<a href="colaboracao.php?id=<?=$data['idProjeto']?>">Voltar</a>