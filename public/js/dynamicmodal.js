$("nav").after(
	'<div id="modal_message" class="modal">' +
	    '<div class="modal-content">' + 
	      	'<h4>Alerta</h4>' +
	    '<p>A bunch of text</p>' +
	'</div>' +
'</div>');

function loadDynamicModal(configs) {
	$("#modal_message h4").text(configs.title);
	$("#modal_message p").text(configs.content);

	//Falta terminar
	if(configs.button) {
		$("#modal_message p").after(
			'<div class="modal-footer">' +
		    	'<a href="#!" id="btn_cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>' +
		      	'<a href="#!" id="btn_create" class=" modal-action modal-close waves-effect waves-green btn-flat">Criar</a>' +
	    	'</div>'
	    );
	}

	$("#modal_message").openModal({complete : configs.onModalHide});
}

function loadDynamicToast(configs) {
	Materialize.toast(configs.content, 1000);
}




