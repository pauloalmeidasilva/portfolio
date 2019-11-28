/**
 * Nome do arquivo:
 *		login.js
 *
 * Descrição:
 *		Arquivo responsável pelo gerenciamneto da tela de login.
 *
 * Estrutura de implementação:
 *		=> Variáveis globais;
 *		=> Funções;
 *		=> Eventos;
 *		=> Document.ready.
 *
 * Revisão:
 *		27/11/2019 - Primeira implementação;
 */

$('#form-login').submit(function(e){
	e.preventDefault()

	$.ajax({
		method: 'GET',
		url: BASE_URL + 'home/autenticar',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){
			limpar()
			Load.fire({
				html: carregar('Verificando...')
			})
		},
		success: function(json){
			console.log(json)
			limpar()
			Load.close()

			if(json['type'] == 'success'){
				Alerta.fire({
					icon: json['type'],
					title: 'Pronto',
					html: carregar('Acessando...'),
					showConfirmButton: false
				})
				window.location = BASE_URL + "painel"
			}else{
				Toast.fire({
					icon: json['type'],
					title: json['title'],
				})
				erro(json['error'])
			}
		},
		error: function(response){
			limpar()
			Load.close()
			console.log(response)
		}
	})
	return false
})