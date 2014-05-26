<h4>PROJETOS ABERTOS</h4>
<table class='table'>
	<thead>
		<tr>
			<td>ID</td>
			<td>CATEGORIA</td>
			<td>PROJETO</td>
			<td class='center_text'>REVISAR</td>
			<td class='center_text'>INFO</td>
			<td class='center_text'>EXCLUIR</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($data['projetos'] as $proj) {?>
		<tr>
			<td class='editar'><?= $proj['id']?></td>
			<td><?= $proj['categoria']?></td>
			<td><?= $proj['nome'] ?></td>
			<td class='editar center_text'><a href='projeto.php?id=<?= $proj['id']?>&mode=007' target="blank"><img src='img/tango/contact-new.png'></a></td>
			<td class='editar center_text'><a href='adm_info_proj.php?id=<?= $proj['id']?>'><img src='img/tango/document-properties.png'></a></td>
			<td class='editar center_text'><a href='adm_excluir_proj.php?id=<?= $proj['id']?>'><img src='img/tango/user-trash.png'></a></td>
		</tr>
			
		<?php }
		?>
	</tbody>
</table>