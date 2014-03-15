<div class='col-2-3 text-r' id='menu'>
			<?php if (isset($_SESSION['user']['fbemail'])) { ?><div class='col-5-6'><?php } ?>
			<ul>
				<?php if ($data['selecionado'] == 'explorar') : ?>
				<li class='selecionado'><strong>EXPLORAR</strong></li>
				<?php else : ?>
				<li><a href='explorar.php'><strong>EXPLORAR</strong></a></li>
				<?php endif; ?>
				
				<?php if ($data['selecionado'] == 'enviar') : ?>
				<li class='selecionado'><strong>ENVIAR PROJETO</strong></li>
				<?php else : ?>
				<li><a href='enviar_projeto.php'><strong>ENVIAR PROJETO</strong></a></li>
				<?php endif; ?>
				
				
				
				<?php 
				if (isset($_SESSION['user']['fbemail'])) { ?>
					<li><a href='logout.php'><strong>LOGOUT</strong></a></li>
				
				<?php } else {
				?>
				<?php if ($data['selecionado'] == 'logar') : ?>
				<li class='selecionado'><strong>LOGAR</strong></li>
				<?php else : ?>
				<li><a href='logar.php'><strong>LOGAR</strong></a></li>
				<?php endif; ?>
				
				<?php } ?>
				
			</ul>
			<?php if (isset($_SESSION['user']['fbemail'])) { ?></div><? } ?>
			<?php if (isset($_SESSION['user']['fbemail'])) { ?><div class='col-1-6 text-c'><?}?>
			<?php if (isset($_SESSION['user']['fbid'])) { ?>
			<a href='perfil.php'><img src="https://graph.facebook.com/<?= $_SESSION['user']['fbid'] ?>/picture" title='<?=$_SESSION['user']['fbfullname']?>' class='fb-pic'></a>
			<?php } ?>
			
			
			<?php if (isset($_SESSION['user']['fbemail'])) { ?></div><? } ?>
		</div>
