$("#img_1").on('click', function() {
	$('#upload_1').trigger('click')
	uploadImg($('#upload_1'), $("#img_1"))
})

$("#img_2").on('click', function() {
	$('#upload_2').trigger('click')
	uploadImg($('#upload_2'), $("#img_2"))
})

$("#img_3").on('click', function() {
	$('#upload_3').trigger('click')
	uploadImg($('#upload_3'), $("#img_3"))
})

let tabela = $('#conteudo').DataTable({
	"language": DT_options,
	"lengthChange": false,
	"pageLength": 5,
	"ajax": BASE_URL + 'portfolio/listar',
	"columns": [
	{ "data": "id" },
	{ "data": "imagem" },
	{ "data": "nome" },
	{ "data": "tipo" },
	{ "data": "status" },
	{ "data": "mostrar_curriculo" },
	{ "data": "acao" }
	],
	"columnDefs": [
	{ className: "text-center text-nowrap align-middle", "targets": '_all' }
	]
})

function editar(id) {
	$.ajax({
		method: 'get',
		url: BASE_URL + 'portfolio/visualizar/'+id,
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
				if(id == 'foto_1'){
					$('#img_1').attr('src', BASE_URL+'upload/'+valor)
				}else if(id == 'foto_2'){
					$('#img_2').attr('src', BASE_URL+'upload/'+valor)
				}else if(id == 'foto_3'){
					$('#img_3').attr('src', BASE_URL+'upload/'+valor)
				}else if(id == 'mostrar_curriculo' || id == 'mostrar_link'){
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

$('#form-novo').on('submit', function(e){
	e.preventDefault()
	$.ajax({
		method: 'post',
		url: BASE_URL + 'portfolio/salvar',
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

$('#btn-cad').on('click', function(){
	$('#form-novo').submit()
})