let tabela = function(){
	$.ajax({
		method: 'post',
		url: BASE_URL + 'experiencia/listar',
		dataType: 'json',
		data: $('#form-pesquisa').serialize(),
		beforeSend: function(){
			clearErrors('#conteudo')
			$('#conteudo').html(loadingIMG('Acessando Banco de Dados...'))
		},
		success: function(json){
			$('#conteudo').html(json)
		},
		error: function(response){
			console.log(response)
		}
	})
}

$('#conteudo').ready(function(){
	tabela()
})

$('#search-curso').keyup(function(){
	tabela()
})

$('#btn-cad').click(function(){
	$.ajax({
		method: 'post',
		url: BASE_URL + 'experiencia/salvar',
		dataType: 'json',
		data: $('#form-novo').serialize(),
		//beforeSend: function(){ clearErrors('#user_aviso') $('#user_aviso').html(loadingIMG('Acessando Banco de Dados...')) },
		success: function(json){
			if (json['status'] == 1){
				clearErrors('#formacao_aviso')
			}else{
				showErrors(json["error_list"], '#formacao_aviso')
			}
		},
		error: function(response){
			console.log(response)
		}
	})
	$('#modal-cad').modal('hide')

	tabela()
})

$('#modal-cad').on('show.bs.modal', function (e) {
	let id = $(e.relatedTarget).data('id')

	//alert(id)

	if (typeof id === "undefined") {
		$('#modal-cad-label').html('Cadastrar Formação')
		$(this).find('#id').val('')
		$(this).find('input:text').val('')
	}else{
		//alert('editando')
		$.ajax({
			method: 'post',
			url: BASE_URL + 'experiencia/visualizar/'+id,
			dataType: 'json',
			success: function(json){
				$.each(json, function(id, message) {
					//alert(id+': '+message)
					$('#'+id).val(message)
				})
				$('#modal-cad-label').html('Editar Formação')
			},
			error: function(response){
				console.log(response)
			}
		})
	}
	
	tabela()
})

$('#modal-del').on('show.bs.modal', function (e) {
	let id = $(e.relatedTarget).data('id')
	let nome = $(e.relatedTarget).data('nome')

	$('#id-del').html(id)
	$('#nome-del').html(nome)
})

$('#btn-del').click(function(){
	let id = $('#id-del').html()
	$.ajax({
		method: 'post',
		url: BASE_URL + 'experiencia/deletar/'+id,
		dataType: 'json',
		success: function(json){
			if (json['status'] == 1){
				clearErrors('#formacao_aviso')
			}else{
				showErrors(json["error_list"], '#formacao_aviso')
			}
		},
		error: function(response){
			console.log(response)
		}
	})
	$('#modal-del').modal('hide')

	tabela()
})