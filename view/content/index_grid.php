<br/>
<div class='text-c'><h4>PROJETOS EM ANDAMENTO</h4></div>
<br/>
<br/>



<?php

$projetos = array();
$projetos[0]['titulo'] = 'Mídias Digitais';
$projetos[0]['img'] = '/tmp/grid1.jpg';
$projetos[0]['descricao'] = 'Mídia digital é um formato de mídia eletrônica onde os dados são armazenados em 
			formato digital (em oposto ao analógico). Pode referir-se ao aspecto técnico da 
			armazenagem e transmissão da informação';
$projetos[0]['pct'] = '15';
$projetos[0]['arrecadado'] = '25000';
$projetos[0]['dias'] = '10';


$projetos[1]['titulo'] = 'Natureza Fractal';
$projetos[1]['img'] = '/tmp/grid2.jpg';
$projetos[1]['descricao'] = 'O romanesco é a inflorescência comestível da (Brassica oleracea var. botrytis), 
			uma variedade da espécie a que pertencem também a couve-flor, o brócolis, a couve, o 
			repolho e a couve-de-bruxelas.';
$projetos[1]['pct'] = '45';
$projetos[1]['arrecadado'] = '10000';
$projetos[1]['dias'] = '10';

$projetos[2]['titulo'] = 'Sheakspeare nas Escolas';
$projetos[2]['img'] = '/tmp/grid3.jpg';
$projetos[2]['descricao'] = 'Com o auxílio de dramaturgos ou de situações improvisadas.';
$projetos[2]['pct'] = '70';
$projetos[2]['arrecadado'] = '70000';
$projetos[2]['dias'] = '9';

$projetos[3]['titulo'] = 'TAMAR';
$projetos[3]['img'] = '/tmp/grid4.jpg';
$projetos[3]['descricao'] = 'A sobrevivência das tartarugas-marinhas continua em risco, 
			após muitos anos de caça intensiva pela sua carapaça, carne (utilizada para sopa) e gordura. 
			Atualmente a caça está controlada mas estes animais continuam a estar ameaçados pelas redes 
			de pesca que matam cerca de 40 000 exemplares por ano.';
$projetos[3]['pct'] = '15';
$projetos[3]['arrecadado'] = '25000';
$projetos[3]['dias'] = '10';

$projetos[4]['titulo'] = 'Back to the 80s';
$projetos[4]['img'] = '/tmp/grid5.jpg';
$projetos[4]['descricao'] = 'Arcade, arcada, ou fliperama, como é tradicionalmente conhecido no Brasil, 
			é um videogame profissional usado em estabelecimentos de entretenimento.';
$projetos[4]['pct'] = '15';
$projetos[4]['arrecadado'] = '25000';
$projetos[4]['dias'] = '10';


$projetos[5]['titulo'] = 'Alex Grey Live Paints';
$projetos[5]['img'] = '/tmp/grid6.jpg';
$projetos[5]['descricao'] = 'Alex Grey (Columbus, Ohio, 29 de Novembro de 1953), é um artista americano especialista em arte espiritual e 
			psicodélica ou arte visionária que é por vezes associados com o movimento da Nova Era.';
$projetos[5]['pct'] = '140';
$projetos[5]['arrecadado'] = '25000';
$projetos[5]['dias'] = '10';

$projetos[6]['titulo'] = 'AK2099';
$projetos[6]['img'] = '/tmp/grid7.jpg';
$projetos[6]['descricao'] = 'Alex Kidd (アレックスキッド, Arekkusu Kiddo?) é o protagonista de uma série de jogos de Video 
			game produzidos pela SEGA entre o final dos anos 80 e início dos anos 90.';
$projetos[6]['pct'] = '90';
$projetos[6]['arrecadado'] = '40000';
$projetos[6]['dias'] = '2';

$projetos[7]['titulo'] = 'Memórias da Capital';
$projetos[7]['img'] = '/tmp/grid8.jpg';
$projetos[7]['descricao'] = 'Brasília é a capital federal do Brasil e a sede do governo do 
			Distrito Federal.7 8 A cidade está localizada na região Centro-Oeste do país, 
			ao longo da região geográfica conhecida como Planalto Central. ';
$projetos[7]['pct'] = '15';
$projetos[7]['arrecadado'] = '25000';
$projetos[7]['dias'] = '10';

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
		<img src='img/<?=$proj['img']?>' />
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