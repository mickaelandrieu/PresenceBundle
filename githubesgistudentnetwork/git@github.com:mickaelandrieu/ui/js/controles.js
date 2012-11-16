// plugin de validation du formulaire

$(document).ready(function(){
	$('#myBeautifulForm').submit(function(){
		var $error = 0;
		//contrôle du champ pseudo
		var reg = new RegExp("\\w");
		var $pseudo = $('#pseudo').val();
		if(reg.test($pseudo)) {
			alert("le pseudo est bon");
		}
		else { 
			$('#pseudo-error').html('Problème de pseudo');
			$('#pseudo-error').css('display','block');
			$error++;
		}

		//contrôle du champ password
		var reg = new RegExp('@');
		var $password = $('#password').val();

		if(!reg.test($password)) {
			alert("le password est bon");
		}
		else { 
			$('#password-error').html('Problème avec le password: @ est un caractère interdit.');
			$('#password-error').css('display','block');
			$error++;

		}

		if($error > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
		
	});
});