$('#descricao').on('keyup', function(){
	let max = parseInt($(this).attr('maxlength'))
	let char = $(this).val()

	$('#info').html((max - char.length) + ' caracteres')
})

$('#escolaridade').on('change', function(){
	// Esta lógica está atrelada com a função get_ensino do arquivo funcoes_helper, verificar se a opção ensino superior está com o indice igual ao da condição abaixo
	if($(this).val() == '6')
		$('#nivel').removeAttr('disabled')
	else
		$('#nivel').attr('disabled', '')
})

$('#modal-formacao').on('hidden.bs.modal', function(){
	$('#form-novo')[0].reset()
	$('#id').val('')
	$('#mostrar_curriculo').removeAttr('checked')
})

$('#filtro').on('keyup', function(){
	tabela.search(this.value).draw();
})

let tabela = $('#conteudo').DataTable({
	"language": DT_options,
	"lengthChange": false,
	"pageLength": 5,
	"ajax": BASE_URL + 'cursos/listar',
	"columns": [
	{ "data": "id" },
	{ "data": "nome" },
	{ "data": "duracao" },
	{ "data": "mostrar_curriculo" },
	{ "data": "acao" }
	],
	"columnDefs": [
	{ className: "text-center", "targets": '_all' }
	]
})

$('#btn-cad').click(function(){
	$.ajax({
		method: 'post',
		url: BASE_URL + 'cursos/salvar',
		dataType: 'json',
		data: $('#form-novo').serialize(),
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

			if(json['type'] == 'success'){
				tabela.ajax.reload()
				$('#modal-curso').modal('hide')
			}
		},
		error: function(response){
			console.log(response)
		}
	})
})

function editar(id) {
	$.ajax({
		method: 'get',
		url: BASE_URL + 'formacao/visualizar/'+id,
		dataType: 'json',
		beforeSend: function(){
			Load.fire({
				html: carregar('Acessando Banco de Dados...')
			})
		},
		success: function(json){
			console.log(json)
			Load.close()

			$.each(json, function(id, valor){
				if(id == 'nivel'){
					if(valor != null){
						$('#nivel').removeAttr('disabled')
						$('#'+id).val(valor)
					}else{
						$('#nivel').attr('disabled', '')
					}
				}else if(id == 'mostrar_curriculo'){
					if(valor == 1){
						$('#'+id).attr('checked', '')
					}else{
						$('#'+id).removeAttr('checked')
					}
				}else{
					$('#'+id).val(valor)
				}
			})

			let max = parseInt($('#descricao').attr('maxlength'))
			let char = $('#descricao').val()
			$('#info').html((max - char.length) + ' caracteres')

			$('#modal-formacao').modal('show')
		},
		error: function(response){
			console.log(response)
		}
	})
}

function deletar(id){
	Swal.fire({
		text: "Você tem certeza que deseja deletar esta Formação Acadêmica?",
		icon: 'warning',
		showCancelButton: true,
		cancelButtonColor: '#aaa',
		cancelButtonText: 'Cancelar',
		confirmButtonColor: 'red',
		confirmButtonText: 'Deletar',
		showClass: {
			popup: 'animated zoomIn faster'
		},
		hideClass: {
			popup: 'animated zoomOut faster'
		},
		allowOutsideClick: false,
		allowEscapeKey: false
	}).then((result) => {
		if(result.value){
			$.ajax({
				method: 'get',
				url: BASE_URL + 'formacao/deletar/'+id,
				dataType: 'json',
				beforeSend: function(){
					Load.fire({
						html: carregar('Acessando Banco de Dados...')
					})
				},
				success: function(json){
					console.log(json)
					Load.close()

					Toast.fire({
						icon: json['type'],
						title: json['title'],
					})

					if(json['type'] == 'success'){
						tabela.ajax.reload()
					}
				},
				error: function(response){
					console.log(response)
				}
			})
		}
	})
}