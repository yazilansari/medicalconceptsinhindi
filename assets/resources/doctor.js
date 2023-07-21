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
						token: $('#save-form').find('input[name=token]').val(),
						role: 'asm'
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

	load('camp_type_id', 'Camp Type', 'camptype', true);
	load('city_id', 'City', 'city', true);
	load('afm_id', 'AFM', 'users', true);	
	load('phlebo_id', 'Phlebo', 'phlebo', true);


	// Add new element
	$(".add").click(function(){
		var total_element = $(".element").length;
		var lastid = $(".element:last").attr("id");
		var split_id = lastid.split("_");
		var nextindex = Number(split_id[1]) + 1;
		var max = 5;

		if(total_element < max ){
			$str  = '<div class="element card clearfix" id="elem_'+nextindex+'">';
			$str += '<button id="remove_'+ nextindex +'" class="remove_card btn btn-danger">X</button>';
			$str += '<div class="col-md-12">';
			$str += '<label class="form-label">Disease Name</label>';
			$str += '<div class="form-group">';
			$str += '<div class="form-line">';
			$str += '<input type="text" id="txt_'+nextindex+'" name="txt_'+nextindex+'" class="form-control" autocomplete="off" />';
	        $str += '</div>';
	        $str += '</div>';
	        $str += '</div>';

	        $str += '<div class="col-md-6">';
			$str += '<label class="form-label">Before Image</label>';
			$str += '<div class="form-group">';
			$str += '<div>';
			$str += '<input type="file" id="before_file_'+nextindex+'" name="before_file_'+nextindex+'" class="form-control" />';
	        $str += '</div>';
	        $str += '</div>';
	        $str += '</div>';

	        $str += '<div class="col-md-6">';
			$str += '<label class="form-label">After Image</label>';
			$str += '<div class="form-group">';
			$str += '<div>';
			$str += '<input type="file" id="after_file_'+nextindex+'" name="after_file_'+nextindex+'" class="form-control" />';
	        $str += '</div>';
	        $str += '</div>';
	        $str += '</div>';
			$str += '</div>';

			$(".element:last").after($str);

		//$("#div_" + nextindex).append("<hr><input type='text' class='form-control' placeholder='Enter your Diseases' id='txt_"+ nextindex +"' name='txt_"+ nextindex +"'>&nbsp;<div class='col-md-12'><div class='col-md-5'>Before: <input type='file' class='form-control' name='before_file_"+ nextindex +"' id='before_file_"+ nextindex +"'></div><div class='col-md-5'>After: <input type='file' class='form-control' name='after_file_"+ nextindex +"' id='after_file_"+ nextindex +"'></div><div class='col-md-2'><button id='remove_" + nextindex +"' type='button' class='remove btn btn-primary waves-effect waves-float'>REMOVE</button></div>");
		}else{
			alert('Maximum 5 Diseases Allowed');
		}
	});
	
	$(document).on('click', '.remove_card', function(e){
		e.preventDefault(); $(this).parent().remove();
	})

	/*remove disease row */
    $(document).on('click', '.d-disease', function(e){
        e.preventDefault(); 
        $this = $(this);
        
        var data = { 'd_upload_id': $this.attr('data-dui'), 'token': $('#save-upload-form').find('[name="token"]').val() }

		$.ajax({
			url: baseUrl + 'doctor/ddisease',
			data: data,
			type: 'POST',
			dataType: 'JSON',
			beforeSend: function(xhr, opts){
				$('#preloader').show();
			},
			success: function(data) {
				if(data.status){
					$this.parent().parent().remove();
				}
				swal('Deleted!', data.msg) 
				$('#preloader').hide();
			},
			error: function(jqXHR, textStatus, errorThrown){
				$('#preloader').hide();
			}
		}) 

    });
	
})(jQuery);