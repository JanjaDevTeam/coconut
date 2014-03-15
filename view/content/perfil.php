<h4>Perfil</h4>
<br/>
<div class='container-100'>
<div class='col-1-4'>
<img src="https://graph.facebook.com/<?= $_SESSION['user']['fbid'] ?>/picture" title='<?=$_SESSION['user']['fbfullname']?>' class='perfil-pic'/>
</div>

<div class='col-3-4'>
	<table>
		<tr>
			<td class='cell-cinza'>Nome:</td>
			<td><?=$_SESSION['user']['fbfullname']?></td>
		</tr>
		<tr>
			<td class='cell-cinza'>Email:</td>
			<td><?=$_SESSION['user']['fbemail']?></td>
		</tr>
		<tr>
			<td class='cell-cinza'>Facebook:</td>
			<td><?=$_SESSION['user']['fbid']?></td>
		</tr>
	</table>
</div>
</div>
<hr/>