(function($){
	var category = $('#category_id');
	var main_category = $('#main_category_id');
	var subcategory = $('#sub_category_id');
	var check_upload_types_data = $("input[type=radio][class=upload_types]:checked").val();
	var check_video_types = $("input[type=radio][name=video_type]:checked").val();
	

	if(type=='edit'){
		$("#category_id").prepend('<div class="disabled-select"></div>');
		$("#sub_category_id").prepend('<div class="disabled-select"></div>');
		//$("#category_id").attr('disabled','disabled');
		//$("#sub_category_id").attr('disabled','disabled');
		
	}

	$('[name=tags]').tagify();
	$('[name=meta_keyword]').tagify();

	if(check_upload_types_data!=undefined){
		// alert(check_upload_types_data);
		if(check_upload_types_data=='audio'){$("#description_div").slideUp();$("#upload_div").slideDown();}
		if(check_upload_types_data=='video'){

			if(check_video_types=='youtube'){
				$("#description_div").slideUp();
				$("#upload_div").slideUp();
				$("#div_video_type").slideDown();
				$("#div_youtube_video").slideDown();
			}
			if(check_video_types=='inhouse'){
				$("#description_div").slideUp();
				$("#upload_div").slideDown();
				$("#div_video_type").slideUp();
				$("#div_youtube_video").slideUp();
			}
			
		}
		// if(check_upload_types_data=='ppt'){$("#description_div").slideUp();$("#upload_div").slideDown();}
		// if(check_upload_types_data=='pdf'){$("#description_div").slideUp();$("#upload_div").slideDown();}
		if(check_upload_types_data=='text'){$("#upload_div").slideUp();$("#description_div").slideDown();}	
		if(check_upload_types_data=='image'){$("#description_div").slideUp();$("#upload_div").slideDown();}		
	} else {
		// alert();
		$("#description_div").hide();
		$("#upload_div").hide();
		$("#div_youtube_video").hide();
	}

	$(document).on("change", "input[name=upload_type]", function(){

		var upload_type = $("input[name=upload_type]:checked").val();

		if(upload_type=='audio'){$("#description_div").slideUp();$("#upload_div").slideDown();$("#div_youtube_video").slideUp();}
		if(upload_type=='video'){$("#description_div").slideUp();$("#upload_div").slideUp();$("#div_youtube_video").slideDown();}
		if(upload_type=='ppt'){$("#description_div").slideUp();$("#upload_div").slideDown();$("#div_youtube_video").slideUp();}
		if(upload_type=='pdf'){$("#description_div").slideUp();$("#upload_div").slideDown();$("#div_youtube_video").slideUp();}
		if(upload_type=='text'){$("#upload_div").slideUp();$("#description_div").slideDown();$("#div_youtube_video").slideUp();}	
		if(upload_type=='image'){$("#description_div").slideUp();$("#upload_div").slideDown();$("#div_youtube_video").slideUp();}
	});

	$(document).on("change", "input[name=video_type]", function(){

		var video_type = $("input[name=video_type]:checked").val();

		if(video_type=='inhouse'){$("#description_div").slideUp();$("#upload_div").slideDown();$("#div_youtube_video").slideUp()}
		if(video_type=='youtube'){$("#description_div").slideUp();$("#upload_div").slideUp();$("#div_youtube_video").slideDown();}
	});

	$(document).on("keyup keydown","input[name=upload_title]", function(){
		
		var upload_title_data = $("#upload_title").val();
		var regex = new RegExp(' ', 'g');
		var text = upload_title_data.replace(regex, '-');
		$("#meta_title").val(text);
		$("#meta_description").val(upload_title_data);
		$("#meta_slug").val(text);

		var regex1 = new RegExp(' ', 'g');
		var text1 = upload_title_data.replace(regex1, ', ');
		$("#meta_keyword").val(text1);
	});

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



	if(category.length){
		category.on('change', function(){
			
			var c_load_cnt = 0; 
			var s_load_cnt = 0;

			var category_data = '';
			c_load_cnt++;
			var r_attempt_to = (c_load_cnt > 1) ? 'reset' : 'load';

			data = { id: $(this).val() }
			load('sub_category_id', 'Sub Category', 'subcategory', true, r_attempt_to, data);

			category_data = $("#category_id option:selected").text();
			category_data = $.trim(category_data);

			
			if(category_data=='Case Study'){
				$("input[type=radio][class=upload_types]").prop('disabled',false);
				$("input[type=radio][class=upload_types]").prop('checked',false);
				$("input[type=radio][id=audio]").prop('disabled',true);
				$("input[type=radio][id=video]").prop('disabled',true);
				$("input[type=radio][id=pdf]").prop('disabled',true);
				$("#div_video_type").slideUp();
			}
			if(category_data=='Video'){
				$("input[type=radio][class=upload_types]").prop('disabled',true);
				$("input[type=radio][class=upload_types]").prop('checked',false);
				$("input[type=radio][id=video]").prop('disabled',false);
				$("#div_video_type").slideDown();
			}
			if(category_data=='Audio'){
				$("input[type=radio][class=upload_types]").prop('disabled',true);
				$("input[type=radio][class=upload_types]").prop('checked',false);
				$("input[type=radio][id=audio]").prop('disabled',false);
				$("#div_video_type").slideUp();
			}
			if(category_data=='Text'){
				$("input[type=radio][class=upload_types]").prop('disabled',true);
				$("input[type=radio][class=upload_types]").prop('checked',false);
				$("input[type=radio][id=text]").prop('disabled',false);
				$("input[type=radio][id=pdf]").prop('disabled',false);
				$("#div_video_type").slideUp();
			}

			if(check_upload_types_data!='undefined'){
				$("input[type=radio][id="+check_upload_types_data+"]").prop('disabled',false);
				$("input[type=radio][id="+check_upload_types_data+"]").prop('checked',true);	
			}
		});
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



	load('sub_category_id', 'Sub Category', 'subcategory', true);
	
	load('category_id', 'Category', 'category', true);

	load('main_category_id', 'Main Category', 'main_category', true);

	load('contributors_id', 'Contributors', 'contributors', true);
	
	
	
})(jQuery);