(function($){

	var data = {};
	var main_category_id = $("#main_category_id").val();
	var type = $("#type").val();
	data.main_category_id = main_category_id;
	data.post_type = type;


	load_post_data(0,0,data);
	
	$(document).on("click",".grid-bullets", function(){

		var count = $(this).attr('data-count');
    	var pagecount = $(this).attr('data-page');

    	load_post_data(count,pagecount,data);
	});

	
	function load_post_data(count=0,pagecount,data){
		
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