/**
 * Materialize Inits
 */
$('select').material_select();

/**
 * Event Handlers
 */

$(".card.horizontal").hover(function(e) {
    console.log("ta em cima");
    $(e.target).closest(".card.horizontal").addClass('z-depth-3');
}, function(e) {
    $(e.target).closest(".card.horizontal").removeClass('z-depth-3');
});

$('ul.tabs').on('click', 'a', function(e) {
    console.log(e.target.id);
    if (e.target.id == "tab_conta") {
        $("#meusanuncios, #myselectedad").hide('slow', function() {
            $("#conta").show('slow', function() {
                
            });
        });
    } else if (e.target.id == "tab_meusanuncios"){
        $("#conta, #myselectedad").hide('slow', function() {
            $("#meusanuncios").show('slow', function() {
                
            });
        });
    }
});

$("#form_ad #btn_create").click(function() {
    $("#form_ad").submit();
});

$("#form_ad").ajaxForm({ 
    dataType:  'json', 
    success: function(response) {
    	console.log(response);
    	if(response.status === "1") {
    		location.reload();
    	}
    },
    error: function(response) {
    	console.log(response);
    }
});

$("#form_userupdate").ajaxForm({ 
    dataType:  'json', 
    success:   function(response) {
        console.log(response);
        if(response.status === "1") {
            //loadDynamicModal({title: "Cadastro Atualizado", content: response.message});
            loadDynamicToast({content: "Cadastro Atualizado com Sucesso!"});
        } else {
            console.log("error");
        }
    },
    error: function(response) {
        console.log(response);
    }
});

$(document).keypress(function(e) {
    if(e.which == 13) {
        $("#form_userupdate").submit();
    }
});

$("#form_userupdate #btn_save").click(function() {
    $("#form_userupdate").submit();
});

$("#form_adupdate #btn_save").click(function() {
    $("#form_adupdate").submit();
});

$("#form_adupdate").ajaxForm({ 
    dataType:  'json', 
    success:   function(response) {
        console.log(response);
        if(response.status === "1") {
            //loadDynamicModal({title: "Cadastro Atualizado", content: response.message});
            loadDynamicToast({content: "Anúncio Atualizado com Sucesso!"});
        } else {
            console.log("error");
        }
    },
    error: function(response) {
        console.log(response);
    }
});

$(document).on('click', '.card', function(event) {
    var id = $(event.target).closest(".card.horizontal")[0].id;

    $("#myselectedad #form_adupdate").attr('id_ad', id);
    $("#myselectedad #form_adupdate #id_ad").val(id);

    $("#meusanuncios").hide('slow', function() {
        
        $.ajax({
            url: '/ad/get',
            type: 'GET',
            dataType: 'json',
            data: {id: id},
        })
        .done(function(response) {
            if (response.status == "1") {
                populateForm("#myselectedad #form_adupdate", response.message);
                $("#myselectedad").show('slow', function() {});
            } else {
                loadDynamicToast({content: "Erro ao carregar anúncio"});
            }
            console.log(response.message);
            console.log("success");
        })
        .fail(function(response) {
            loadDynamicToast({content: "Erro ao carregar Anúncio!"});
            console.log(response);
            console.log("error");
        });
    });
});

$("#form_adupdate #btn_remove").click(function(event) {

    id = $("#myselectedad #form_adupdate").attr('id_ad');

    $.ajax({
        url: '/ad/delete',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
    })
    .done(function(response) {
        if (response.status == "1") {
            $("#myselectedad").hide('slow', function() {
                $("#" + id).remove();
                $("#meusanuncios").show('slow', function() {});
            });
        } else {
            loadDynamicToast({content: "Erro ao remover Anúncio!"});
        }
        console.log(response);
        console.log("success");
    })
    .fail(function(response) {
        loadDynamicToast({content: "Erro ao remover Anúncio!"});
        console.log(response);
        console.log("error");
    });
});

$(document).on('change', '#form_adupdate [name=state]', function(event) {
    var options = "";

    //Singleton Pattern
    var states = citiesOf.init(this.value, function(cities) {
        options += '<option value="" disabled="" selected="">Cidade</option>';
    
        $.each(cities, function(index, val) {
            options += '<option value="' + index + '">' + val + '</option>';    
        });

        $('#form_adupdate [name=city]').html(options);
    });
});

$(document).on('change', '#form_userupdate [name=state]', function(event) {
    var options = "";

    //Singleton Pattern
    var states = citiesOf.init(this.value, function(cities) {
        options += '<option value="" disabled="" selected="">Cidade</option>';
    
        $.each(cities, function(index, val) {
            options += '<option value="' + index + '">' + val + '</option>';    
        });

        $('#form_userupdate [name=city]').html(options);
    });
});