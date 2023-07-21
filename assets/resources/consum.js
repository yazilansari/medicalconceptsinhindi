(function($){

	var type = "reports";
	var data = {};
	var sub_category_id = $("#sub_category_id").val();
	data.sub_category_id = sub_category_id;


	load_text_data(0,0,data);
	
	$(document).on("click",".grid-bullets", function(){

		var count = $(this).attr('data-count');
    	var pagecount = $(this).attr('data-page');

    	load_text_data(count,pagecount,data);
	});

	$(document).on("click", "#resetBtn", function(){

		data.keywords = '';
		data.month = '';
		data.year = '';

		load_phlebo_consum_reports(0,0,data);
	});

	$(document).on("click", "#resetBtn_1", function(){

		data.keywords = '';

		load_camp_consum_reports(0,0,data);
	});

	
	function load_text_data(count=0,pagecount,data){
		
		data.search = 1;        
        data.token = $('input[name="token"]').val();        
        data.page = pagecount;
        grid_keywords = data.keywords;
        
        var url = baseUrl + controller + '/lists';
        $.post(url + '/' + count , data , function(data){	            
            
            $("#listing_div_ajax").html(data);
        });
	}

})(jQuery);