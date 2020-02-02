/**
* Nome do arquivo:
*		util.js
*
* Descrição:
*		Arquivo base do projeto, nele deve ser armazenado configurações,
*		constantes e funções que serão usados em todo o projeto.
*
* Estrutura de implementação:
*		=> Constantes;
*		=> Variáveis de configuração;
*		=> Funções.
*
* Revisão:
*		27/11/2019 - Primeira implementação;
*/

/*
* Constantes:
*		=> BASE_URL: url base para as requisições ajax;
*/
const BASE_URL = "https://localhost/projeto/portfolio/"

const Toast = Swal.mixin({
	toast: true,
	position: 'top',
	showConfirmButton: false,
	timer: 3000,
	timerProgressBar: true,
	onOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
	}
})

const Load = Swal.mixin({
	showConfirmButton: false,
	icon: 'info',
	title: 'Aguarde',
	showClass: {
		popup: 'animated zoomIn faster'
	},
	hideClass: {
		popup: 'animated zoomOut faster'
	},
	allowOutsideClick: false,
	allowEscapeKey: false
})

const Alerta = Swal.mixin({
	confirmButtonColor: '#3085d6',
	confirmButtonText: 'Fechar',
	showClass: {
		popup: 'animated zoomIn faster'
	},
	hideClass: {
		popup: 'animated zoomOut faster'
	},
	allowOutsideClick: false,
	allowEscapeKey: false
})

const DT_options = {
	"lengthMenu": "Mostrar _MENU_ registros por página",
	"zeroRecords": "Nenhum Dado encontrado",
	"info": "Página _PAGE_ de _PAGES_",
	"infoEmpty": "Nenhum registro disponível",
	"infoFiltered": "(filtrado do tatal de _MAX_ registros)"
}

/*
 * Funções:
 *		=> limpar(): limpa todas os avisos e retira a classe "is-invalid" dos input;
 *		=> erro(id): adiciona a classe "is-invalid" nos inputs;
 *		=> carregar(mensagem): apresenta o icone de carregamento junto de uma mensagem.
 */
 function limpar() {
 	$(".is-invalid").removeClass("is-invalid")
 }

 function erro(id) {
 	limpar()
 	$(id).addClass("is-invalid")
 }

 function carregar(mensagem="") {
 	return "<i class='fas fa-spinner fa-pulse'></i>&nbsp;" + mensagem
 }

 function uploadImg(input_file, img){
 	$(input_file).change(function(){
 		const file = $(this)[0].files[0]
 		const fileReader = new FileReader()
 		fileReader.onloadend = function(){
 			$(img).attr('src', fileReader.result) 
 		}
 		fileReader.readAsDataURL(file)
 	})
 }

 // $('input, textarea').on('keyup', function(){
 // 	this.value = this.value.toUpperCase()
 // })