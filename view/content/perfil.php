<h4>Perfil</h4>
<br/>
<div class='container-100'>
<div class='col-1-4'>
<img src="https://graph.facebook.com/<?=$data['fbid']?>/picture?type=large" title='<?=$data['fbfullname']?>' class='perfil-pic'/>
</div>

<div class='col-3-4'>
	<table>
		<tr>
			<td class='cell-cinza'>Nome:</td>
			<td><?=$data['fbfullname']?></td>
		</tr>
		<tr>
			<td class='cell-cinza'>Email:</td>
			<td><?=$data['fbemail']?></td>
		</tr>
		<tr>
			<td class='cell-cinza'>Fb Id:</td>
			<td><?=$data['fbid']?></td>
		</tr>
	</table>
</div>
</div>
<hr/>
