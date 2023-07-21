(function($){
	
	var load = function(elem, placeholder_txt, controller, change_trigger = false, attempt, data = ''){

		$('#'+ elem).select2({
			placeholder: "Select "+ placeholder_txt,
		    allowClear: true,
		    ajax: {
			    url: baseUrl + controller + '/options',
			    dataType: 'json',
			    type: 'POST',
			    data: function (params) {
				    var query = {
				        search: params.term,
				        page: params.page || 1,
				        token: $('#save-form').find('input[name=token]').val()
				    }

				    if(data.id){ query['id'] = data.id; }
				    //console.log(query);
				    // Query parameters will be ?search=[term]&page=[page]
				    return query;
				    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
				},
                cache: true
			}
		});

		if(change_trigger){
			if(attempt == 'reset'){
				$('#' + elem).val(null).trigger('change');	
			}
			else{
				$('#' + elem).trigger('change');	
			}
		}
	}	

	if($('#area_id').length){
		load('area_id', 'Area', 'area', true);
	}

	if($('.p_dates').length){
		$('.p_dates').datepicker({
        	dateFormat: 'dd-mm-yy', 
    	});
	}

})(jQuery);