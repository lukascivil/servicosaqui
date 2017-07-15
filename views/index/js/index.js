$(document).ready(function () {  

	"use strict";

	var leftconfig_positionheight_original = ($('#leftconfig').offset().top) - (parseFloat($('#leftconfig').css('marginTop')));

	$(document).scroll(function() { 

		var navjump = true;
	    var yscrolltop = $(this).scrollTop() + $(".nav-wrapper").height();
	    var leftconfig_positionheight_modified = $('#leftconfig').offset().top + $("#leftconfig").height();
		var leftconfig_height_modified = $("#leftconfig").height();
    	var alturadamain = $('.main').height();
    	var alturadapagination = $('.footer').offset().top;

    	/*console.log("leftconfig_height_modified: " + leftconfig_height_modified);
    	console.log("leftconfig_positionheight_modified: " + leftconfig_positionheight_modified);
    	console.log("alturadamain: " + alturadamain);
    	console.log("yscrolltop: " + yscrolltop);
    	console.log("yscrolltop - alturadamain: " + Math.abs(yscrolltop - alturadamain));
    	console.log("alturadapagination: " + alturadapagination);*/

	    if (yscrolltop >= leftconfig_positionheight_original) {
	    	//Default: Desktop Devices 992px
	    	if ($(window).width() >= 992) {
		    	if(yscrolltop <= alturadamain) {
			    	if (Math.abs(alturadapagination - (yscrolltop + 20)) >= $("#leftconfig").height()) {
						console.log(1);
							$("#topconfig_form").insertBefore("#leftconfig_02");
							$("#leftconfig").offset({ top: yscrolltop });
					} else {
						console.log(2);
						var perfectheight = (alturadapagination -  20) - leftconfig_height_modified;
						$("#leftconfig").offset({ top: perfectheight});
					}
				}
			}
	    } else {
	    	console.log(4);
	    	navjump = false;
	    	$("#leftconfig").offset({top: leftconfig_positionheight_original});
	    	$("#topconfig_form").appendTo("#topconfig");
	    }
	});	

	var maincards = (function ($) {

		var defaults = {
			firstsearch: false
		};

		var filters = {
			filter_city: 		"",
			filter_service: 	"",
			filter_sort: 		"",
			filter_state: 		"",
			filter_text: 		"",
			filter_servicetype: "",
			filter_limit: 		"10",
			filter_page: 		"0"
		};

		var firstempty = true;

		function __Constructor(options) {
			$.extend(defaults, options);
		}

		function init(pageclick) { 
			render({resetpagination: true}); //resetpagination as true will init
		}

		function getCards(callback) {

			$.ajax({
				url: $("#URL").text() + 'ad/getmain/',
				type: 'GET',
				dataType: 'json',
				data: filters
			})
			.done(function(response) {
				callback(response.message);
			})
			.fail(function(response) {
				console.log(response);
			})
			.always(function() {
			});
		}

		function mainCardsInput(message) {
			var fixture = [];
			var active = "";
			
			$(".progress").hide();
			$("achados").text((message[message.length-1].config[1].adsfound));
			$("#cardsmain").html("");

			console.log(message);
			if(!jQuery.isEmptyObject(message)) {
				$.each( message, function( key, value ) {

					if(key == (message.length - 1)) { // Stop on config obj
	                    return;
	                }

					fixture =
						['<div id=' + value.id + ' class="card horizontal white">' ,
			        		'<div class="card-image">' ,
					        	'<img src="' + value.path + '">' ,
					      	'</div>' ,
					      	'<div class="card-stacked">' ,
			        			'<div class="card-content">' ,
			        				'<div>' ,
			        					'<span class="card-title">' + value.title + '</span>' ,
			        				'</div>' ,
			        				'<div>' ,
			        					'<span class="black-text">' + value.description + '</span>' ,
			        				'</div>' ,
					      		'</div>' ,
					      		'<div class="card-action">' ,
			        					'<span class="black-text right">' + value.datetime + '</span>' ,
					      		'</div>' ,
					      	'</div>' ,
			        	'</div>'].join("");

		        	$("#cardsmain").append(fixture);
				});
			}
		}

		function setPagination(numberofpages) {
			$("#pagination-long").html("");

			if(numberofpages != 0) {
				$('#pagination-long').materializePagination({
			        align: 'center',
			        firstPage: 1,
			        lastPage: numberofpages,
			        useUrlParameter: false,
			        onClickCallback: function(requestedPage) {
			            bindToValues({"filter_page": (requestedPage - 1)});
			            render({resetpagination: false});
			        }
			    });
			} else {
				$("#cardsmain").html('<h4 class="center">Nenhum serviço encontrado...<h4>');
			}
		}

		function bindToValues(obj) {
			//Ps. Generally the size of the object will be 1
			$.each(obj, function(index, value) {
				filters[index] = value;
			});
		}

		function render(options) {

			var defaults = {
				resetpagination: false
			};

			$.extend(defaults, options);

			$("html, body").stop(); //Prevent another animation
			$("html, body").animate({ scrollTop: 0 }, "slow");

			setTimeout(function() { 
				$(".progress").hide();
				getCards(function(message) {
					mainCardsInput(message);

					if (defaults.resetpagination) {
						var numberofpages = message[message.length-1].config[0].numberofpages;
						bindToValues({"filter_page": 0});
						setPagination(numberofpages);
					}
				}); 
			}, 150);
		}

		/**
		 * Event Handlers
		 */

		$(document).on('click', '.card', function(event) {
			window.open("adview?id=" + $(event.target).closest(".card.horizontal")[0].id,"_self");
		});

		$("#filter_text").keyup(function(event) {

			var value = "";
			var id = event.target.id;
			var obj = {};

			if($("#filter_text").val() != "") {
				firstempty = true;
				if(firstempty) {
					$(".progress").show();
					obj[id] = $("#" + id).val();
					
					bindToValues(obj);
					render({resetpagination: true});
				}
			} else {
				if(firstempty) {
					$(".progress").show();
					firstempty = false;
					obj[id] = $("#" + id).val();

					bindToValues(obj);
					render({resetpagination: true});
				}
			}
		});

		$(document).on('change', '#filter_state, #filter_sort, #filter_service, #filter_city, #filter_servicetype, #filter_limit', function(event) {

			var id = event.target.id;
			var value = "";
			var obj = {};

			switch (id) {
			    case "filter_state":
			        var options = "";

				    //Singleton Pattern to load cities
				    var states = citiesOf.init(this.value, function(cities) {
				        options += '<option value="" selected="">Cidade</option>';
				    
				        $.each(cities, function(index, val) {
				            options += '<option value="' + index + '">' + val + '</option>'; 
				        });

				        $('#main #filter_city').html(options);
				    });

				    value = $("#" + id).val();
			        break;
			    case "filter_city":
			       	value = $("#" + id).val();
			        break;
			    case "filter_service":
			       	value = $("#" + id).val();
			        break;
			    case "filter_sort":
			    	value = $("#" + id).val();
			        break;
			    case "filter_servicetype":
			    	/*if ($(this).prop('checked'))
			    		value = "personal";
			    	else
			    		value = "company";*/
			    	value = $("#" + id).val();
			        break;
			    case "filter_limit":
			    	value = $("#" + id).val();
			    	break;
			}

			obj[id] = value;
		    bindToValues(obj);
		    render({resetpagination: true});
		});

		return {
			get: getCards,
			init: init
		};

	})(jQuery);

	maincards.init();
});


