(function($){

	var main_category = $('#main_category_id');
	var category = $('#category_id');
	//var folder = $('#folder_id');
	var sub_category = $('#sub_category_id');

	if(type=='edit'){
		$("#main_category_id").prepend('<div class="disabled-select"></div>');
		$("#category_id").prepend('<div class="disabled-select"></div>');
		//$("#folder_id").prepend('<div class="disabled-select"></div>');
		$("#sub_category_id").prepend('<div class="disabled-select"></div>');

		$("#category_id").attr('enabled','enabled');
		$("#main_category_id").attr('enabled','enabled');
		//$("#folder_id").attr('enabled','enabled');
		$("#sub_category_id").attr('enabled','enabled');

	}

	var load = function(elem, placeholder_txt, controller, change_trigger = false, attempt, data = ''){

		$('#'+ elem).select2({
			placeholder: "Select "+ placeholder_txt,
		    allowClear: true,
		    ajax: {
			    url: baseUrl + controller + '/options_new',
			    dataType: 'json',
			    type: 'POST',
			    data: function (params) {
				    var query = {
				        search: params.term,
				        page: params.page || 1,
				        token: $('#save-form').find('input[name=token]').val()
				    }
				    if(data.id){ query['id'] = data.id; }
				    if(data.main_id){ query['main_id'] = data.main_id; }
				    console.log(query);
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

	if(main_category.length){
		main_category.on('change', function(){
			
			var c_load_cnt = 0; 
			var s_load_cnt = 0;

			var main_category_data = '';
			c_load_cnt++;
			var r_attempt_to = (c_load_cnt > 1) ? 'reset' : 'load';

			data = { main_id: $(this).val() }
			load('category_id', 'Category', 'category', true, r_attempt_to, data);

			main_category_data = $("#main_category_id option:selected").text();
			main_category_data = $.trim(main_category_data);

		});
	}

	if(category.length){
		category.on('change', function(){
			
			var c_load_cnt = 0; 
			var s_load_cnt = 0;

			var category_data = '';
			c_load_cnt++;
			var r_attempt_to = (c_load_cnt > 1) ? 'reset' : 'load';

			data = {id: $(this).val() }
			load('folder_id', 'Folder', 'folder', true, r_attempt_to, data);
			load('sub_category_id', 'Sub Category', 'subcategory', true, r_attempt_to, data);

			main_category_data = $("#category_id option:selected").text();
			main_category_data = $.trim(main_category_data);

		});
	}

	// if(sub_category.length){
	// 	sub_category.on('change', function(){
			
	// 		var c_load_cnt = 0; 
	// 		var s_load_cnt = 0;

	// 		var sub_category_data = '';
	// 		c_load_cnt++;
	// 		var r_attempt_to = (c_load_cnt > 1) ? 'reset' : 'load';

	// 		data = {id: $(this).val() }
	// 		load('folder_id', 'Folder', 'folder', true, r_attempt_to, data);

	// 		main_category_data = $("#sub_category_id option:selected").text();
	// 		main_category_data = $.trim(main_category_data);

	// 	});
	// }

	load('category_id', 'Category', 'category', true);
	load('main_category_id', 'Main Category', 'main_category', true);
	load('sub_category_id', 'Sub Category', 'subcategory', true);
	
	
})(jQuery);