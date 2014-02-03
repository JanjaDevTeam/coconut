<h4 class='text-c'>Cadastro</h4>

<div class='container-60'>
	<form action='registrar.php' method='post' class='form pad-3'>
		<label for="fullname">NOME COMPLETO</label>
		<input type='text' name='fullname' required>
		
		<label for="email">EMAIL</label>
		<input type='email' name='email' required>
		
		<label for="email2">CONFIRMAR EMAIL</label>
		<input type='email' name='email2' required>
		
		<label for="senha">SENHA</label>
		<input type='text' name='senha'/>
		
		<label for="senha2">CONFIRMAR SENHA</label>
		<input type='text' name='senha2' required>
		
		<input type="hidden" name="token" value="c6dac7f7fb5c8203d2abbceee452e30b">
		<div class='text-c'>
			<input type='submit' value='Registrar'>
		</div>
	</form>
</div>

<br/><br/>
