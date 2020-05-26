let tabela2 = $('#conteudo-status').DataTable({
	"language": DT_options,
	"lengthChange": false,
	"pageLength": 5,
	"ajax": BASE_URL + 'configuracoes/listarStatus',
	"columns": [
	{ "data": "id" },
	{ "data": "descricao" },
	{ "data": "cor" },
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
		url: BASE_URL + 'configuracoes/visualizarStatus/'+id,
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
				$('#'+id+'-status').val(valor)
			})
		},
		error: function(response){
			console.log(response)
		}
	})
}

function deletar(id){
	Swal.fire({
		text: "A exclusão deste status só será possível caso nenhum Projeto esteja vinculado a ele. Você tem certeza que deseja deletar este status?",
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
				url: BASE_URL + 'configuracoes/deletarStatus/'+id,
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
						tabela2.ajax.reload()
					}
				},
				error: function(response){
					console.log(response)
				}
			})
		}
	})
}

$('#btn-salvar-status').click(function(){
	$.ajax({
		method: 'post',
		url: BASE_URL + 'configuracoes/salvarStatus',
		dataType: 'json',
		data: $('#form-status').serialize(),
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
				tabela2.ajax.reload()
				$('#form-status')[0].reset()
				$('#id-status').val('')
			}
		},
		error: function(response){
			console.log(response)
		}
	})
})