(function($){

	$(document).on('click', '.schedule-btn', function(){
		var patient = $(this).attr('data-patient');

		$('#counselling_modal').find('input[name="patient_id"]').val(patient);
	})

	$(document).on('click', '.update_status', function(){
		var counselling = $(this).attr('data-counselling');

		$('#counselling_modal').find('input[name="counselling_id"]').val(counselling);
	})

	$('.date_saturday').datepicker({
		dateFormat: 'dd-mm-yy',
		beforeShowDay: function(date){
	      	return (date.getDay() == 6) ? [true] : [false];
	    }
	});

	var reset_counselling_form = function(formObj){
		
		$.each(formObj.find('input, select'), function(i, field) {
			var elem = $('[name="'+ field.name +'"]').parent();
			elem.removeClass('error').siblings('label.error').remove()
		});

		$('.success-completion').hide(); $('#counselling-form').show();
	}

	$('#counselling_modal').on('hide.bs.modal', function () {
	   	var counselling_form = $(this).find('form');
		counselling_form[0].reset();

		reset_counselling_form(counselling_form);
	});

	$('#counselling-form').on('submit', function(e){
		e.preventDefault();
		var $this = $(this); 

		$.each($this.find('input, select, textarea'), function(i, field) {
  			var elem = $('[name="'+ field.name +'"]').parent();

  			elem.removeClass('error').next('label.error').remove();
  		});

		$.ajax({
			url: $this.attr('action'),
			type: 'POST',
			data: $this.serialize(),
			dataType: 'JSON',
			beforeSend: function(xhr, opts){
				//$('#preloader').show();
			},
			success: function(data){
				if(data.status){
					$('.success-completion').show(); $('#counselling-form').hide();

					//$('.btn-close-modal').trigger('click');
					$('input[name="keywords"]').trigger('keyup');
				}

				if(data.errors)	{
					$.each(data.errors, function(key, val) {
	                	var elem = $('[name="'+ key +'"]', $this).parent();
						
						elem.removeClass('error').next('label.error').remove()
							.end().addClass('error').after(val);	
		            });

		            $this.find('.form-line.error').eq(0).addClass('focused');
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				//$('#preloader').hide();
			}
		})
	})

})(jQuery)
