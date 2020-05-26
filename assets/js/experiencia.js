$('#descricao').on('keyup', function(){
	let max = parseInt($(this).attr('maxlength'))
	let char = $(this).val()

	$('#info').html((max - char.length) + ' caracteres')
})

$('#modal-curso').on('hidden.bs.modal', function(){
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
	"ajax": BASE_URL + 'experiencias/listar',
	"columns": [
	{ "data": "id" },
	{ "data": "cargo" },
	{ "data": "empresa" },
	{ "data": "inicio" },
	{ "data": "termino" },
	{ "data": "mostrar_curriculo" },
	{ "data": "acao" }
	],
	"columnDefs": [
	{ className: "text-center text-nowrap", "targets": '_all' }
	]
})

$('#btn-cad').click(function(){
	$.ajax({
		method: 'post',
		url: BASE_URL + 'experiencias/salvar',
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
				$('#modal-trabalho').modal('hide')
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
		url: BASE_URL + 'experiencias/visualizar/'+id,
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
				if(id == 'mostrar_curriculo'){
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

			$('#modal-curso').modal('show')
		},
		error: function(response){
			console.log(response)
		}
	})
}

function deletar(id){
	Swal.fire({
		text: "Você tem certeza que deseja deletar este Curso?",
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
				url: BASE_URL + 'cursos/deletar/'+id,
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