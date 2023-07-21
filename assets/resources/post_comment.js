(function($){

	var type = "reports";
	var data = {};
	var upload_data_id = $("#upload_data_id").val();
	data.upload_data_id = upload_data_id;
	var type = $("#type").val();
	data.d_type = type;

	if(type=='post'){
		load_comment_data(0,0,data);
	}
	if(type=='comment'){
		load_comment_data(0,0,data);
	}

	
	$(document).on('click', 'input[name=submit]', function(){
		$('#respond').find('label.error').remove();		

		var c_data = {};
		c_data.users_name = $('#users_name').val();
		c_data.upload_data_id = $('#upload_data_id').val();
		c_data.email = $('#email').val();
		c_data.comment = $('#comment').val();

		var url = baseUrl + controller + '/save_comments';
        $.post(url  , c_data , function(data_arr){
			
			data_arr = JSON.parse(data_arr);        
            
            if(!data_arr.status){
            
            	if(data_arr.errors)	{
					$.each(data_arr.errors, function(key, val) { 
						var elem = $('[name="'+ key +'"]').parent();
						elem.end().after(val);
	                	
		            });
		            
		            $('.form-line.error').eq(0).addClass('focused');
				}
            }else{
            	load_comment_data(0,0,data);
            	$("#contact_success_1").show();
            	$("#contact_success_1").delay("slow").fadeOut(10000);
            	$('input[type=text]').val('');
            	$('input[type=email]').val('');
            	$('textarea').val('');
            }
        });
	});	

	$(document).on("click",".grid-bullets", function(){

		var count = $(this).attr('data-count');
		if(count==''){
			count=0;
		}
    	var pagecount = $(this).attr('data-page');

    	load_comment_data(count,pagecount,data);
	});

	
	function load_comment_data(count=0,pagecount,data){
		
		data.search = 1;        
        data.token = $('input[name="token"]').val();        
        data.page = pagecount;
        grid_keywords = data.keywords;
        
        var url = baseUrl + controller + '/listing_ajax';
        $.post(url + '/' + count , data , function(data){	            
            
            if(type=='post'){
            	$("#post_comments_ajax").html(data);
            }else{
            	$("#comments_ajax").html(data);
            }
        });
	}

})(jQuery);