function validateFormRegistro() {

	var senha  = document.forms['registro']['senha'].value;
	var senha2 = document.forms['registro']['senha2'].value;

	var email  = document.forms['registro']['email'].value;
	var email2 = document.forms['registro']['email2'].value;

	if (email != email2) {
		alert('Os emails devem ser iguais.');
		return false;
	}

	if (senha.length < 6) {
		alert('A senha deve ter no mínimo 6 caracteres.');
		return false;
	}

	if (senha != senha2) {
		alert('As senhas devem ser iguais.');
		return false;
	}

	
	



	return true;
}