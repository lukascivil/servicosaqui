/**
 * Materialize Inits
 */
$('select').material_select();
$('.modal-trigger').leanModal();
$(".button-collapse").sideNav();

/**
 * Helpers
 */
function signIn() {
	$('#modal_signIn').openModal();
}

function signUp() {
	$('#modal_signUp').openModal();
}

/**
 * Event Handlers
 */

$("#form_createaccount #btn_create").click(function() {
    //alert("hi");
    $("#form_createaccount").submit();
});

$("#form_login #btn_login").click(function() {
    $("#form_login").submit();
});

$("#form_createaccount").ajaxForm({ 
    dataType:  'json', 
    success:   function(response) {
    	console.log(response);
    	if(response.status === "1") {
            loadDynamicModal({
                title: "Cadastro",
                content: response.message,
                onModalHide:function() {
                    window.open("index", "_self");
                } 
            });
    	} else {
    		loadDynamicToast({content: "Não foi possível criar conta!"});
    		console.log("error");
    	}
    },
    error: function(response) {
    	console.log(response);
    }
});

$("#form_login").ajaxForm({ 
    dataType:  'json', 
    success: function(response) {
    	console.log(response);
    	if(response.status === "1") {
    		location.reload();
    	} else {
    		loadDynamicToast({content: "Login ou Senha inválidos!"});
    	}
    },
    error: function(response) {
    	console.log(response);
    }
});