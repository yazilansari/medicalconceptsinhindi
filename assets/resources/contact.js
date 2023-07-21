(function($){

	$(document).on('click', 'input[name=submit]', function(){

		$('#contact_123').find('label.error').remove();	

		var c_data 				= {};
		c_data.contact_name 	= $('#contact_name').val();
		c_data.contact_email 	= $('#contact_email').val();
		c_data.contact_number 	= $('#contact_number').val();
		c_data.contact_message 	= $('#contact_message').val();

		var url = baseUrl + controller + '/save';
        $.post(url  , c_data , function(data_arr){
			
			data_arr = JSON.parse(data_arr);        
            
            if(!data_arr.status){
            
            	if(data_arr.errors)	{
					$.each(data_arr.errors, function(key, val) { 
						var elem = $('[name="'+ key +'"]').parent();
						
						elem.end().after('<label class="error">'+val+'</label>');
	                	
		            });
		            
		            $('.form-line.error').eq(0).addClass('focused');
				}
            }else{
            	$("#contact_success").show();
            	$("#contact_success").delay("slow").fadeOut(10000);
            	$('input[type=text]').val('');
            	$('input[type=email]').val('');
            	$('textarea').val('');
            }
        });
	});	

	

})(jQuery);