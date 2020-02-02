$("#img").on('click', function() {
	$('#upload').trigger('click')
	uploadImg($('#upload'), $("#img"))
})

$('#modal_senha').on('hidden.bs.modal', function () {
	$('#form-senha')[0].reset()

	$('#progress1').attr('style', 'width: 0%')
	$('#progress1').attr('aria-valuenow', '0')
	$('#progress1').html('0%')

	$('#conf_nova').removeClass('is-valid')
	$('#conf_nova').removeClass('is-invalid')

	$('#btn-senha').attr('disabled', '')
})

$('#nova').on('keyup', function(){
	let senha = $(this).val()
	let forca = 0

	// Verifica o tamanho
	if(senha.length == 7){
		forca += 15
	}else if(senha.length >= 8 && senha.length < 10){
		forca += 20
	}else if(senha.length >= 10){
		forca += 25
	}

	// Verifica se tem letras minúsculas
	if(senha.length == 7 && senha.match(/[a-z]+/)){
		forca += 15
	}else if(senha.length >= 8 && senha.length < 10 && senha.match(/[a-z]+/)){
		forca += 20
	}else if(senha.length >= 10 && senha.match(/[a-z]+/)){
		forca += 25
	}

	// Verifica se tem letras maiúsculas
	if(senha.length == 7 && senha.match(/[A-Z]+/)){
		forca += 15
	}else if(senha.length >= 8 && senha.length < 10 && senha.match(/[A-Z]+/)){
		forca += 20
	}else if(senha.length >= 10 && senha.match(/[A-Z]+/)){
		forca += 25
	}

	// Verifica se tem caracter especial
	if(senha.length == 7 && senha.match(/['"!@#$%*()-+=§/ªº|]/)){
		forca += 15
	}else if(senha.length >= 8 && senha.length < 10 && senha.match(/['"!@#$%*()-+=§/ªº|]+/)){
		forca += 20
	}else if(senha.length >= 10 && senha.match(/['"!@#$%*()-+=§/ªº|]+/)){
		forca += 25
	}

	$('#progress1').attr('style', 'width: '+ forca + '%')
	$('#progress1').attr('aria-valuenow', forca)
	$('#progress1').html(forca+'%')

	if(forca < 25){
		$('#progress1').removeClass('bg-warning bg-sucess bg-info')
		$('#progress1').addClass('bg-danger')
	}else if(forca >= 25 && forca < 50){
		$('#progress1').removeClass('bg-danger bg-sucess bg-info')
		$('#progress1').addClass('bg-warning')
	}else if(forca >= 50 && forca < 75){
		$('#progress1').removeClass('bg-danger bg-sucess bg-warning')
		$('#progress1').addClass('bg-info')
	}else if(forca >= 75){
		$('#progress1').removeClass('bg-danger bg-warning bg-info')
		$('#progress1').addClass('bg-success')
	}
})

$('#conf_nova').on('keyup', function(){
	let senha1 = $('#nova').val()
	let senha2 = $('#conf_nova').val()

	if(senha1.length > 7){
		if(senha2 == ''){
			$('#conf_nova').removeClass('is-valid')
			$('#conf_nova').removeClass('is-invalid')
			$('#btn-senha').attr('disabled', '')
		}else if(senha1 !== senha2){
			$('#conf_nova').removeClass('is-valid')
			$('#conf_nova').addClass('is-invalid')
			$('#btn-senha').attr('disabled', '')
		}else if(senha1 === senha2){
			$('#conf_nova').addClass('is-valid')
			$('#conf_nova').removeClass('is-invalid')
			$('#btn-senha').removeAttr('disabled')
		}
	}
})

$('#form-user').submit(function(e){
	e.preventDefault()
	$.ajax({
		method: 'post',
		url: BASE_URL + 'usuario/atualizar',
		dataType: 'json',
		data: new FormData(this),
		contentType: false,
		processData: false,
		beforeSend: function(){
			Load.fire({
				html: carregar('Atualizando Banco de Dados...')
			})
		},
		success: function(json){
			console.log(json)
			Load.close()

			Toast.fire({
				icon: json['type'],
				title: json['title'],
			})
			$('#upload').val('')

		},
		error: function(response){
			console.log(response)
		}
	})
})

$('#btn-senha').on('click', function(){
	if($('#atual').val() != ''){
		$.ajax({
			method: 'post',
			url: BASE_URL + 'usuario/troca_senha',
			dataType: 'json',
			data: $('#form-senha').serialize(),
			beforeSend: function(){
				Load.fire({
					html: carregar('Alterando senha...')
				})
			},
			success: function(json){
				console.log(json)
				Load.close()

				Toast.fire({
					icon: json['type'],
					title: json['title'],
				})
			},
			error: function(response){
				console.log(response)
			}
		})
	}else{
		Toast.fire({
			icon: 'warning',
			title: 'Insira a senha atual para continuar',
		})
	}
})