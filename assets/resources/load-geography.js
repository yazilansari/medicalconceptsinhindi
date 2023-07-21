(function($){

	var zone = $('#zone_id');
	var region = $('#region_id');
	var area = $('#area_id');
	var city = $('#city_id');


    

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

	if(region.length){
		
		zone.on('change', function(){
			r_load_cnt++;
			var r_attempt_to = (r_load_cnt > 1) ? 'reset' : 'load';

			data = { id: $(this).val() }
			load('region_id', 'Region', 'region', true, r_attempt_to, data);
		});
	}

	if(area.length){
		region.on('change', function(){
			a_load_cnt++;
			var a_attempt_to = (a_load_cnt > 1) ? 'reset' : 'load';

			data = { id: $(this).val() }
			load('area_id', 'Area', 'area', true, a_attempt_to, data);
		})
	}
	
	if(city.length){
		city.on('change', function(){
			c_load_cnt++;
			var c_attempt_to = (c_load_cnt > 1) ? 'reset' : 'load';

			data = { id: $(this).val() }
			load('city_id', 'City', 'city', true, c_attempt_to, data);
		})
	}


	
	load('zone_id', 'Zone', 'zone', true);

})(jQuery);
