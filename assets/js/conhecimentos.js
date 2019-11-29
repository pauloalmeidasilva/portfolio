$('#valor').html($('#porcentagem_experiencia').val())
$('#porcentagem_experiencia').change(function(){
	$('#valor').html($('#porcentagem_experiencia').val())
})

let tabela = DataTable({
	 	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nenhum Dado encontrado",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado do tatal de _MAX_ registros)"
        },
	 	"scrollY": "50vh",
        "scrollCollapse": true,
        "paging": false,
        "searching": false,
        "ajax": BASE_URL + 'conhecimentos/listar?filtro=' + $('#filtro').val()
    })
// let tabela = function(){
// 	$.ajax({
// 		method: 'GET',
// 		url: BASE_URL + 'conhecimentos/listar',
// 		dataType: 'json',
// 		data: {"filtro": $('#filtro').val()},
// 		beforeSend: function(){
// 		},
// 		success: function(json){
// 			console.log(json)
// 		},
// 		error: function(response){
// 			console.log(response)
// 		}
// 	})
// }

$(document).ready(function(){
	 $('#conteudo').html(tabela.update())
	//tabela()
})

$('#search-nome').keyup(function(){
	tabela()
})

$('#btn-cad').click(function(){
	$.ajax({
		method: 'post',
		url: BASE_URL + 'conhecimentos/salvar',
		dataType: 'json',
		data: $('#form-novo').serialize(),
		//beforeSend: function(){ clearErrors('#user_aviso') $('#user_aviso').html(loadingIMG('Acessando Banco de Dados...')) },
		success: function(json){
			if (json['status'] == 1){
				clearErrors('#conhecimentos_aviso')
			}else{
				showErrors(json["error_list"], '#conhecimentos_aviso')
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

	if (typeof id === "undefined") {
		$('#modal-cad-label').html('Cadastrar Curso')
		$(this).find('#id').val('')
		$(this).find('input:text').val('')
		$(this).find('#porcentagem_experiencia').val('')
		$('#valor').html($('#porcentagem_experiencia').val())
	}else{

		$.ajax({
			method: 'post',
			url: BASE_URL + 'conhecimentos/visualizar/'+id,
			dataType: 'json',
			success: function(json){
				$.each(json, function(id, message) {
				//alert(id+': '+message)
				$('#'+id).val(message)
			})
				$('#modal-cad-label').html('Editar Curso')
				$('#valor').html($('#porcentagem_experiencia').val())
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
		url: BASE_URL + 'conhecimentos/deletar/'+id,
		dataType: 'json',
		success: function(json){
			if (json['status'] == 1){
				clearErrors('#conhecimentos_aviso')
			}else{
				showErrors(json["error_list"], '#conhecimentos_aviso')
			}
		},
		error: function(response){
			console.log(response)
		}
	})
	$('#modal-del').modal('hide')

	tabela()
})