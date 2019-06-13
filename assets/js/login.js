$('#form-login').submit(function(){
	$.ajax({
		method: 'POST',
		url: BASE_URL + 'login/autenticar',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){
			clearErrors('#aviso')
			$('#aviso').html(loadingIMG('Verificando...'))
		},
		success: function(json){
			if (json['status'] == 1){
				clearErrors('#aviso')
				$('#aviso').html(loadingIMG('Acessando...'))
				window.location = BASE_URL + "dashboard"
			}else{
				showErrors(json["error_list"], '#aviso')
			}
		},
		error: function(response){
			console.log(response)
		}
	})
	return false
})