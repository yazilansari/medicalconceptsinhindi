(function($){
    var colspan = $('#tbody').find('tr').last().find('td').attr('colspan');
	$(".clearS").on("click", function(){
        localStorage.clear();
        localStorage.removeItem('main_category_id');
        localStorage.removeItem('category_id');
        localStorage.removeItem('folder_id');
        localStorage.removeItem('sub_category_id');
        localStorage.removeItem('main_category_text');
        localStorage.removeItem('category_text');
        localStorage.removeItem('sub_category_text');

        data.page = 0;
        data.search = 1;
        data.token = $('input[name="token"]').val();
        data.div_id = [];


        var url = baseUrl + 'posts/lists?all=all_results';
        load_and_clear(url,data);
       // alert(url);
       window.location.reload();
    });

    function load_and_clear(url,data){
        
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            beforeSend: function(xhr, opts){
                $('#tbody').html('<tr><td colspan="'+ colspan +'"><center><b>Searching....</b></center></td><tr>');
            },
            success: function(data) {
                if($('#checkall').length){
                    $('#checkall').prop("checked", false);    
                }
                
                $('#tbody').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                //alert('Oops ! there might be some problem, please try after some time');
            }
        });
    }

})(jQuery)