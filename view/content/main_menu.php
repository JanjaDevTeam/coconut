<div class='col-2-3 text-r' id='menu'>
			<ul>
				<?php if ($data['selecionado'] == 'explorar') : ?>
				<li class='selecionado'><strong>EXPLORAR</strong></li>
				<?php else : ?>
				<li><a href='#'><strong>EXPLORAR</strong></a></li>
				<?php endif; ?>
				
				<?php if ($data['selecionado'] == 'enviar') : ?>
				<li class='selecionado'><strong>ENVIAR PROJETO</strong></li>
				<?php else : ?>
				<li><a href='#'><strong>ENVIAR PROJETO</strong></a></li>
				<?php endif; ?>
				
				<?php if ($data['selecionado'] == 'registrar') : ?>
				<li class='selecionado'><strong>REGISTRAR</strong></li>
				<?php else : ?>
				<li><a href='registrar.php'><strong>REGISTRAR</strong></a></li>
				<?php endif; ?>
				
				<?php if ($data['selecionado'] == 'logar') : ?>
				<li class='selecionado'><strong>LOGAR</strong></li>
				<?php else : ?>
				<li><a href='#'><strong>LOGAR</strong></a></li>
				<?php endif; ?>
				
			</ul>
		</div>
