const BASE_URL = "https://localhost/projeto/Portfolio/"
//const BASE_URL = "https://pauloricardo.ga/"

function clearErrors(id_aviso) {
	$(".is-invalid").removeClass("is-invalid")
	$(id_aviso).html("")
	$(id_aviso).removeClass("text-danger")
}

function showErrors(error_list, id_aviso) {
	clearErrors()

	$.each(error_list, function(id, message) {
		$(id).addClass("is-invalid")
		$(id_aviso).addClass("text-danger")
		$(id_aviso).html(message)
	})
}

function loadingIMG(message="") {
	return "<i class='fas fa-spinner fa-pulse'></i>&nbsp;" + message
	
}