<br/>
<div class='text-c'><h4>PROJETOS EM ANDAMENTO</h4></div>
<br/>
<br/>



<?php




// projeto real
$projetos[8] = $data['teste'];

shuffle($projetos);


$coluna[0] = array();
$coluna[1] = array();
$coluna[2] = array();
$coluna[3] = array();

$j = 0;
for ($i=0; $i < sizeof($projetos); $i++) {
	array_push($coluna[$j], $projetos[$i]);
	$j++;
	if ($j == 4) $j = 0;
}


echo '<div>';
for ($i=0; $i<=3; $i++) {
	echo "<div class='col-1-4-pad-3 bbox'>";
	foreach ($coluna[$i] as $proj) {
		if ($proj['pct'] > 100) {
			$proj['pctbarra'] = 100;
		}else {
			$proj['pctbarra'] = $proj['pct'];
		}
		?>


		<div class='projeto-grid'>
		<a href='projeto.php?id=1'><img src='<?=$proj['img']?>' /></a>
		<div class='projeto-grid-infobox'>
			<p><strong><?=$proj['titulo']?></strong></p>
			<div class='projeto-grid-descricao bbox'>
			<?=$proj['descricao']?>
			</div>
			<div class='financiado '><strong><span class='letra-escura'><?=$proj['pct']?>%</span> financiado</strong></div>
			<div id='barra-container'>
				<div id='barra' style="width: <?=$proj['pctbarra']?>%"></div>
			</div>
			<div id='info-container'>
				<div class='letra-escura'>
					<div class='col-1-2 bbox text-c'><strong><?=$proj['arrecadado']?></strong></div>
					<div class='col-1-2 bbox text-c'><strong><?=$proj['dias']?> dias</strong></div>
				</div>
				<div class='col-1-2 bbox text-c'>levantado</div>
				<div class='col-1-2 bbox text-c'>restantes</div>
				
			</div>
		</div>
	</div>


		<?php

	}
	echo "</div>";

}
?>
</div>
<div class='clear-b'></div>
