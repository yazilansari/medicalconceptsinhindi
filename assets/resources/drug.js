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

	if($('#scheme_id').length){
		load('scheme_id', 'Scheme', 'scheme', true);
	}

	var date_dependencies = function(parentElem, dependentElem){

		parentElem.datepicker({
	        dateFormat: 'dd-mm-yy', 
	        onSelect: function(date){
	            
	            var pattern = /(\d{2})\-(\d{2})\-(\d{4})/;
	            var dt = new Date(date.replace(pattern,'$2-$1-$3'));

	            var selectedDate = new Date(dt);
	            //for adding 1 day
	            //var msecsInADay = 86400000;
	            var msecsInADay = 0;

	            var endDate = new Date(selectedDate.getTime() + msecsInADay);

	            dependentElem.datepicker('option', 'minDate', endDate);

	            $(this).change();
	        }
	    });

	    dependentElem.datepicker({ 
	    	dateFormat: 'dd-mm-yy',
	    	onSelect: function() {
				$(this).change();
			} 
	    });
	}

	if($('#dispatch_date').length){
		var collected_date = ( $('#dispatch_date').val() != '') ? $('#dispatch_date').val() : '';

		$('#delivery_date').datepicker({ 
			dateFormat: 'dd-mm-yy',
	    	minDate: new Date(collected_date)
	    });

		date_dependencies($('#dispatch_date'), $('#delivery_date'));
	}


	$('#send-tracking-code').on('click', function(e){
		e.preventDefault();
		var order_id = $(this).attr('data-order-id');
		var tracking_code = $('input[name="tracking_no"]');
		var dispatch_date = $('#dispatch_date');

		$.ajax({
			url: baseUrl + 'drug/send_tracking_code',
			data: {
				order_id: order_id, 
				tracking_no: tracking_code.val(), 
				dispatch_date: dispatch_date.val(), 
				token: $('#save-form').find('input[name=token]').val()
			},
			type: 'POST',
			dataType: 'JSON',

			beforeSend: function(xhr, opts){
				//$('#preloader').show();
			},
			success: function(data){
				if (data.status == true) {		
					$('[name="tracking_no"]').parent().siblings('label.error').remove();		
					alert('Tracking code is sent to the Patient, ASM, HO.');
				}
				else{
					if(data.error_msg){
						alert(data.error_msg);
					}

					if(data.errors)	{
						$.each(data.errors, function(key, val) {
							var elem = $('[name="'+ key +'"]').parent();
							elem.siblings('label.error').remove().end().after(val);		
			            });
					}
		        }
		        //$('#preloader').hide();					
			},
			error: function(jqXHR, textStatus, errorThrown){
				//$('#preloader').hide();
			}
		})
	})

	$('#send-delivery-update').on('click', function(e){
		e.preventDefault();
		var order_id = $(this).attr('data-order-id');
		var delivery_status = $('input[name="delivery_status"]');
		var delivery_date = $('#delivery_date');

		var delivery_checked = (delivery_status.prop('checked')) ? 1 : 0;

		$.ajax({
			url: baseUrl + 'drug/notify_on_delivery',
			data: {
				order_id: order_id, 
				delivery_status: delivery_checked, 
				delivery_date: delivery_date.val(),
				token: $('#save-form').find('input[name=token]').val()
			},
			type: 'POST',
			dataType: 'JSON',

			beforeSend: function(xhr, opts){
				//$('#preloader').show();
			},
			success: function(data){
				if (data.status == true) {			
					$('[name="delivery_status"]').parent().siblings('label.error').remove();
					alert('Patient, ASM and HO is notified about the delivery.');
				}
				else{
					if(data.error_msg){
						alert(data.error_msg);
					}

					if(data.errors)	{
						$.each(data.errors, function(key, val) {
							var elem = $('[name="'+ key +'"]').parent();
							elem.siblings('label.error').remove().end().after(val);	
			            });
					}
		        }
		        //$('#preloader').hide();					
			},
			error: function(jqXHR, textStatus, errorThrown){
				//$('#preloader').hide();
			}
		})
	});

	$('#send_inv_approved_msg').on('click', function(e){
		e.preventDefault();
		var order_id = $(this).attr('data-order-id');
		var verified = $('input[name="verified"]');

		var is_verified = (verified.prop('checked')) ? 1 : 0;

		$.ajax({
			url: baseUrl + 'drug/verify_drug_request',
			data: {order_id: order_id, verified: is_verified, token: $('#save-form').find('input[name=token]').val()},
			type: 'POST',
			dataType: 'JSON',

			beforeSend: function(xhr, opts){
				//$('#preloader').show();
			},
			success: function(data){
				if (data.status == true) {		
					$('[name="verified"]').parent().siblings('label.error').remove();		
					alert('Verification SMS is sent to ASM and HO.');
				}
				else{
					if(data.error_msg){
						alert(data.error_msg);
					}

					if(data.errors)	{
						$.each(data.errors, function(key, val) {
							var elem = $('[name="'+ key +'"]').parent();
							elem.siblings('label.error').remove().end().after(val);	
			            });
					}
		        }
		        //$('#preloader').hide();					
			},
			error: function(jqXHR, textStatus, errorThrown){
				//$('#preloader').hide();
			}
		})
	});


})(jQuery);