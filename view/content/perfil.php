<h4>Perfil</h4>
<br/>
<div class='container-100'>
<div class='col-1-4'>
<img src="https://graph.facebook.com/<?= $_SESSION['fb']['user'] ?>/picture" title='<?=$_SESSION['fb']['fbfullname']?>' class='perfil-pic'/>
</div>

<div class='col-3-4'>
	<table>
		<tr>
			<td class='cell-cinza'>Nome:</td>
			<td><?=$_SESSION['fb']['fbfullname']?></td>
		</tr>
		<tr>
			<td class='cell-cinza'>Email:</td>
			<td>Facebook: <?=$_SESSION['fb']['fbemail']?></td>
		</tr>
		<tr>
			<td class='cell-cinza'>Facebook:</td>
			<td><?=$_SESSION['fb']['user']?></td>
		</tr>
	</table>
</div>
</div>
<hr/>