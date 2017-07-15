function populateForm(frm, data) {   
    //console.log(frm + " - " + data);
    $.each(data, function(key, value) {  
        var ctrl = $('[name='+key+']', frm);  
        if(ctrl.is('select')){
            $("option",ctrl).each(function(){
                if (this.value==value) { this.selected=true; }
            });
        } else {
            switch(ctrl.prop("type")) { 
                case "radio": case "checkbox":   
                    ctrl.each(function() {
                        if($(this).attr('value') == value) $(this).attr("checked",value);
                    });   
                    break;  
                default:
                    ctrl.val(value); 
            }  
        }
    });  
}