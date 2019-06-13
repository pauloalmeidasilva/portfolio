$('#form-user').submit(function(){
		$.ajax({
			method: 'post',
			url: BASE_URL + 'usuario/atualizar',
			dataType: 'json',
			data: $(this).serialize(),
			beforeSend: function(){
				clearErrors('#user_aviso')
				$('#user_aviso').html(loadingIMG('Acessando Banco de Dados...'))
			},
			success: function(json){
				if (json['status'] == 1){
					clearErrors('#user_aviso')
					$('#user_aviso').html(loadingIMG('Atualizando...'))
				}else{
					showErrors(json["error_list"], '#user_aviso')
				}
				clearErrors('#user_aviso')
			},
			error: function(response){
				console.log(response)
			}
		})
		return false
	})