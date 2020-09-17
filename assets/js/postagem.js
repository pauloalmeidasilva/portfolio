$('#valor').html($('#porcentagem_experiencia').val())
$('#porcentagem_experiencia').change(function(){
	$('#valor').html($('#porcentagem_experiencia').val())
})


let tabela = $('#conteudo').DataTable({
	"language": DT_options,
	"lengthChange": false,
	"pageLength": 5,
	"ajax": BASE_URL + 'postagens/listar',
	"columns": [
	{ "data": "id" },
	{ "data": "nome_linguagem" },
	{ "data": "tempo_experiencia" },
	{ "data": "porcentagem_experiencia" },
	{ "data": "mostrar_curriculo" },
	{ "data": "acao" }
	],
	"columnDefs": [
	{ className: "text-center text-nowrap", "targets": '_all' }
	]
})

function editar(id) {
	$.ajax({
		method: 'get',
		url: BASE_URL + 'conhecimentos/visualizar/'+id,
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
				if(id == 'porcentagem_experiencia'){
					$('#valor').html(valor)
					$('#'+id).val(valor)
				}else if(id == 'mostrar_curriculo'){
					if(valor == 1)
						$('#'+id).attr('checked', '')
					else
						$('#'+id).removeAttr('checked')
				}else{
					$('#'+id).val(valor)
				}


			})

			$('#modal-cad').modal('show')
		},
		error: function(response){
			console.log(response)
		}
	})
}

function deletar(id){
	Swal.fire({
		text: "Você tem certeza que deseja deletar esta Linguagem?",
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
				url: BASE_URL + 'conhecimentos/deletar/'+id,
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

$('#filtro').on('keyup', function(){
	tabela.search(this.value).draw();
})

$('#modal-cad').on('hidden.bs.modal', function(){
	$('#form-novo')[0].reset()
	$('#id').val('')
	$('#valor').html('25')
	$('#mostrar_curriculo').removeAttr('checked')
})

$('#btn-cad').click(function(){
	$.ajax({
		method: 'post',
		url: BASE_URL + 'conhecimentos/salvar',
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
				$('#modal-cad').modal('hide')
			}
		},
		error: function(response){
			console.log(response)
		}
	})
})