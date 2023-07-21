(function($){

	$( "#camp_date" ).datepicker({
		minDate:-3,
		dateFormat: 'dd-mm-yy',
    	changeMonth: true
    	
	});

	$('#start_time').mdtimepicker({
        timeFormat: 'hh:mm', // format of the time value (data-time attribute)
        format: 'hh:mm',    // format of the input value
        theme: 'blue',        // theme of the timepicker
        readOnly: true,       // determines if input is readonly
        hourPadding: false    // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
    }); 
    
    $('#end_time').mdtimepicker({
        timeFormat: 'hh:mm', // format of the time value (data-time attribute)
        format: 'hh:mm',    // format of the input value
        theme: 'blue',        // theme of the timepicker
        readOnly: true,       // determines if input is readonly
        hourPadding: false   // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
    }); 

    $(document).on("change", "#city_id", function(){

    	var city_id = $("#city_id").val();
    	get_rsm_city_data(city_id);
    });

	var city = $('#city_id');
	var city_id = $("#city_id").val();
	var doc_id = $('#doc_id');
	/*counter to reset select2 values on a change event of the element*/
	var r_load_cnt = 0; //Region: 0 counter stands for when no change event is triggered
	var a_load_cnt = 0; //Area: 0 counter stands for when no change event is triggered

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

	var load_doctor_data = function(role){

		doc_id.select2({
		    placeholder: "Select Doctor",
		    allowClear: true,
		    ajax: {
			    url: baseUrl + 'doctor/options',
			    dataType: 'JSON',
			    type: 'POST',
			    data: function (params) {
				    var query = {
				        search: params.term,
				        page: params.page || 1,
				        role: role,
				        token: $('#save-form').find('input[name=token]').val()
				    }
				    // Query parameters will be ?search=[term]&page=[page]
				    return query;
				    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
				},
                cache: true
			}
		});

		doc_id.trigger('change');
	};

	var get_doctor_data = function(id, attempt){

		$.ajax({
			url: baseUrl + 'doctor/doctor_info',
			data: {id: id, token: $('#save-form').find('input[name=token]').val()},
			type: 'POST',
			dataType:'JSON',
			success: function(data, textStatus, jqXHR){

				$('.fill').each(function (){
					var fieldName = $(this).attr('name');
					$(this).val(data[fieldName]);
				})

				

			}
		});
	}

	var get_rsm_city_data = function(id, attempt){

		$.ajax({
			url: baseUrl + 'city/city_rsm_info',
			data: {id: id, token: $('#save-form').find('input[name=token]').val()},
			type: 'POST',
			dataType:'JSON',
			success: function(data, textStatus, jqXHR){
				
				$("#division_name").val(data.division_name);
				$("#division_id").val(data.users_division_id);			

			}
		});
	}

	if(city_id!=""){
		get_rsm_city_data(city_id);
	}

	if(doc_id){

		/*var role = reporting_mgr.data('role');*/
		var attempt = 0;

		doc_id.on('change', function(){
			attempt++;
			var counter = (attempt > 1) ? 'reset' : 'load';

			if( $(this).val() ){
				get_doctor_data($(this).val(), counter);	
			} 
		});

		load_doctor_data(doc_id);
	}

	

	load('phlebo_id', 'Phlebo', 'phlebo', true);
	load('doc_id', 'Doctor', 'doctor', true);
	load('city_id', 'City', 'city', true);
	load('camp_type_id', 'Camp Type', 'camptype', true);
	
	
})(jQuery);