<br/><div class='text-c'><h4>ENVIE SEU PROJETO</h4></div>
	<br/>

	<div class='container-70 aviso-projeto'>
	<?php if($data['erros'] == 1):?>
	<div class="aviso-vermelho">Todos os campos são obrigatórios.</div><br/>
	<?php endif; ?>
	<form name="formProjeto" action='perguntas.php' method='post' class='form-stacked' onSubmit="return validateFormProjeto()">
		<label>Nome do projeto</label>
		<br/><input name='nome' type='text' value="<?=$data["nome"]?>" />


		<br/>
		<br/>
		<br/>
		<label>Histórico e como você vai utilizar o valor financiado.</label>
		<br/><textarea name='descricao' rows="5" ><?=$data["descricao"]?></textarea>

		<br/>
		<br/>
		<br/>
		<label>Frase de efeito</label>
		<p>Escolha uma frase impactante para promover seu projeto.</p>
		<br/><input type="text" name="frase" value="<?=$data['frase']?>" />

		<br/>
		<br/>
		<br/>
		<label>Categoria</label>
		<br/>
		<select name="categoria">
			<?php
			foreach($data['categoria'] as $cat) {
				if($cat['id'] == $data['idCategoria']) {
					echo "<option value='$cat[id]' selected>$cat[categoria]</option>\n";
				} else {
					echo "<option value='$cat[id]'>$cat[categoria]</option>\n";
				}
			}
			?>
		</select>


		<br/>
		<br/>
		<br/>
		<label>Valor Pretendido</label>
		<p>Em R$ (reais). Não utilize ponto ou vírgula.</p>
		<br/><input type="text" name="valor" value="<?=$data['valor']?>" />

		<br/>
		<br/>
		<br/>
		<label>Prazo máximo para atingir a meta</label>
		<p>Número de dias. Máximo: 60</p>
		<br/><input type="text" name="prazo" class='pequeno' value='<?=$data['prazo']?>' />

		<br/>
		<br/>
		<br/>
		<label>Video do youtube</label>
		<p>Ex: https://www.youtube.com/watch?v=rFOl-9SNxLY</p>
		<br/><input type="text" name="video" value='<?=$data['video']?>' />

		<br/>
		<br/>
		<br/>
		<label>Links relacionados</label>
		<p>Coloque links importantes para seu projeto separados por vírgula e utilize http://</p>
		<p>Exemplo: http://www.google.com, http://www.gmail.com</p>
		<br/><input type="text" name="links" value='<?=$data['links']?>' />
		<div class='text-c'><br/><button class='botao'>Próxima Etapa</button></div>
	</form>
	</div>
	<br/>
	<br/>


<div class='clear-b'></div>
