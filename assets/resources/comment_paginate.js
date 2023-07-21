(function($){
    //var controller = $('.custom-table').attr('id');
    var keywords = $("input[name=keywords]");
    var post_id = $("#post_id").val();
    var data = {};

    if(post_id){
        load_comment_data(0,0,data);
    }

    var div_id = [];

    $('#collectinfo').on('submit', function(e){
        e.preventDefault();
    })

    

    /*search data as per keyword input & other filters*/
    /*function search(count, pagecount, controller){
        data.search = 1;

        data.keywords = keywords.val();
        data.token = $('input[name="token"]').val();
        data.from = (from_d.length) ? from_d.val() : '';
        data.to = (to_d.length) ? to_d.val() : '';
        data.page = pagecount;

        $('#checkall').prop("checked", false);

        $(document).ajaxStart(function(){
            $(window).data("<img src='"+baseUrl+"front_assets/images/india.gif'>");
        });
        
        $.post(baseUrl + listing_url + '/' + count , data , function(data){
            $('#listing_div').html(data); 
            window.scrollTo(0,300);
        });
    }*/

    function load_comment_data(count=0,pagecount,data){
        
        data.search = 1;        
        data.token = $('input[name="token"]').val();        
        data.page = pagecount;
        data.post_id = post_id;
        grid_keywords = data.keywords;
        
        var url = baseUrl + controller + '/comments_list_ajax';
        $.post(url + '/' + count , data , function(data){     
            $("#comments_list_ajax").html(data);
        });
    }

    /*pagination bullets clicked call the search function*/
    $(document).on('click', '.page-bullets', function(e){
        var count = $(this).attr('data-count');
        var pagecount = $(this).attr('data-page');

        load_comment_data(count, pagecount, data);
    });

    $(document).on("click",".comment_approve", function(){
        var type = $(this).attr('data-type');
        var id = $(this).attr('data-id');
        let action = $(this).attr('data-action');

        var comment_data = {};
        comment_data.type = type;
        comment_data.id = id;
        let c_url = baseUrl + controller + '/comment_action';
        if(action == "new") {
            c_url = baseUrl + controller + '/comment_action_new';

        }
        swal({
            title: 'Are you sure?',
            text: "",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes!',
            cancelButtonText: 'No, cancel!',
            showLoaderOnConfirm: true
        }).then(function (result) {
            if (result.value) {
                
                $.ajax({
                    url: c_url,
                    data: comment_data,
                    type: 'POST',
                    dataType: 'JSON',
                    beforeSend: function(xhr, opts){
                    },
                    success: function(data) {
                        
                        if(data.msg){
                            swal(data.msg)             
                        }

                        var data_c = {};
                        data_c.check = 1;
                        var url = baseUrl + listing_url;
                        load_comment_data(0,0,data);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                    }
                }) 
            }
        })
    });
    

    $("#filter").on("click", function(){
            $("#div_filter").slideDown(500);
        });

    

})(jQuery);