let tabela = $('#conteudo-tipo').DataTable({
	"language": DT_options,
	"lengthChange": false,
	"pageLength": 5,
	"ajax": BASE_URL + 'configuracoes/listarTipo',
	"columns": [
	{ "data": "id" },
	{ "data": "descricao" },
	{ "data": "status" },
	{ "data": "acao" }
	],
	"columnDefs": [
	{ className: "text-center text-nowrap", "targets": '_all' }
	]
})

function editar(id) {
	$.ajax({
		method: 'get',
		url: BASE_URL + 'configuracoes/visualizarTipo/'+id,
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
				$('#'+id+'-tipo').val(valor)
			})
		},
		error: function(response){
			console.log(response)
		}
	})
}

function deletar(id){
	Swal.fire({
		text: "A exclusão deste tipo só será possível caso nenhum Projeto esteja vinculado a ele. Você tem certeza que deseja deletar este tipo?",
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
				url: BASE_URL + 'configuracoes/deletarTipo/'+id,
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

$('#btn-salvar-tipo').click(function(){
	$.ajax({
		method: 'post',
		url: BASE_URL + 'configuracoes/salvarTipo',
		dataType: 'json',
		data: $('#form-tipo').serialize(),
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
				$('#form-tipo')[0].reset()
				$('#id-tipo').val('')
			}
		},
		error: function(response){
			console.log(response)
		}
	})
})