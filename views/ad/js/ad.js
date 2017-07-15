/**
 * Event Handlers
 */

$("#form_ad #btn_create").click(function() {
    $("#form_ad").submit();
});

$("#form_ad").ajaxForm({ 
    dataType:  'json', 
    success: function(response) {
    	console.log(response);
    	if(response.status === "1") {
            /*loadDynamicModal({
                title: "Anúncio", 
                button: false, 
                content: response.message,
                onModalHide: function() {
                    $( "#main" ).hide( "slow", function() {
                        window.open("index", "_self");
                    });
                }
            });*/
            $( "#main" ).hide( "slow", function() {
                window.open("index", "_self");
            });
    	}
    },
    error: function(response) {
    	console.log(response);
    }
});

$(document).on('change', '#form_ad [name=state]', function(event) {
    var options = "";

    //Singleton Pattern
    var states = citiesOf.init(this.value, function(cities) {
        options += '<option value="" disabled="" selected="">Cidade</option>';
    
        $.each(cities, function(index, val) {
            options += '<option value="' + index + '">' + val + '</option>';    
        });

        $('#form_ad [name=city]').html(options);
    });
});