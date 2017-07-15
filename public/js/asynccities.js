
//Singleton Pattern
var citiesOf = (function () {
    var states;
 
    function createInstance(statesigla, $callback) {
        var states = new getStates(statesigla, $callback);
    }
 	
 	function getStates(statesigla, $callback) {
		$.getJSON( "public/utilities/estados-cidades.json", function(response) { 

	        var cities = [];

	        $.each(response.estados, function(index, val) {
	            if (val.sigla == statesigla) {
	                cities = val.cidades;
	                return false;
	            }
	        });

			$callback(cities); 
		});
	}

    return {
        init: createInstance
    };
})();

