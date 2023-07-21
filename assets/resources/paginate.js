(function($){
    //var controller = $('.custom-table').attr('id');
    var keywords = $("input[name=keywords]");
    var from_d = $("input[name=from_date]");
    var to_d = $("input[name=to_date]");
    var colspan = $('#tbody').find('tr').last().find('td').attr('colspan');
    
    var div_id = [];

    $('#collectinfo').on('submit', function(e){
        e.preventDefault();
    })

    var data = {};

    /*search data as per keyword input & other filters*/
    function search(count, pagecount, controller){
        data.search = 1;

        data.keywords = keywords.val();
        data.token = $('input[name="token"]').val();
        data.from = (from_d.length) ? from_d.val() : '';
        data.to = (to_d.length) ? to_d.val() : '';
        data.page = pagecount;
       
        $('#checkall').prop("checked", false);

        $.post(baseUrl + listing_url + '/' + count , data , function(data){
            $('#tbody').html(data); 
            window.scrollTo(0,0);
        });
    }

    /*pagination bullets clicked call the search function*/
    $(document).on('click', '.page-bullets', function(e){
        var count = $(this).attr('data-count');
        var pagecount = $(this).attr('data-page');

        search(count, pagecount, controller);
    });

    /*search on keyword updatation while typing into the omni search box*/
    keywords.on('keyup', function(){
        data.page = 0;
        data.search = 1;
        data.keywords = $(this).val();
        data.token = $('input[name="token"]').val();
        data.from = (from_d.length) ? from_d.val() : '';
        data.to = (to_d.length) ? to_d.val() : '';

        var query_str = '?xcel=1';

        if(data.keywords !== ''){
            query_str += '&keywords=' + data.keywords;
        }
        if(data.from !== ''){
            query_str += '&from='+data.from;
        }
        if(data.to !== ''){
            query_str += '&to='+data.to;
        }

        var download_url_with_params = baseUrl + download_url + query_str;
        $('a#export').attr('href', download_url_with_params);
        
        //var url = baseUrl + controller + '/lists/';
        var url = baseUrl + listing_url;

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
        })
    })

    /*Initialize from_date & to_date with condition(i.e to_date must be greater than from_date)*/
    if($('#from_date').length){
        
        /*condition block will work only if from & to date filters are available*/
        
        $('#from_date').datepicker({
            dateFormat: 'yy-mm-dd', 
            changeMonth: true,
            changeYear: true,
             yearRange: "2018:+10",
            onSelect: function(date){
                
                var pattern = /(\d{2})\-(\d{2})\-(\d{4})/;
                var dt = new Date(date.replace(pattern,'$3-$2-$1'));

                var selectedDate = new Date(dt);
                //var msecsInADay = 86400000;
                var msecsInADay = 0;

                var endDate = new Date(selectedDate.getTime() + msecsInADay);

                $('#to_date').datepicker('option', 'minDate', endDate);

                $(this).change();
            }
        });

        $('#to_date').datepicker({ 
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "2018:+10",
            onSelect: function() {
                $(this).change();
            } 
        });
    }

    /*delete records - select for delete*/
    $(document).on('click', '#checkall', function(){

        if($(this).prop("checked"))
            $("input[type='checkbox']").prop("checked",true);
        else
            $("input[type='checkbox']").prop("checked",false);
    });

    /*delete selected records*/
    $('.deleteAction').on('click', function(e){
        e.preventDefault(); 
        $this = $(this).closest('form');

        if(! $('input[name="ids[]"]:checked').length ){
            swal('No records selected!');
            return;
        }

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            showLoaderOnConfirm: true
        }).then(function (result) {
            if (result.value) {
                var data = $this.serialize();

                $.ajax({
                    url: $this.attr('action'),
                    data: data,
                    type: 'POST',
                    dataType: 'JSON',
                    beforeSend: function(xhr, opts){
                    },
                    success: function(data) {
                        keywords.trigger('keyup');
                        if(data.msg){
                            swal('Deleted!', data.msg)             
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                    }
                }) 
            }
        })
    });

    /*Upload CSV file for importing data*/
    $('#uploadForm').on('submit', function(e){
        e.preventDefault();

        var $this = jQuery(this);
        var formUrl = $this.attr('action');       

        $('[name=csvfile]').parent().removeClass('error').siblings('label.error').remove();

        if(window.FormData != 'undefined'){
            var formData = new FormData($this[0]);
            
            jQuery.ajax({
                url: formUrl,
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                mimeType: 'multipart/form-data',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(xhr, opts){
                    $('#preloader').show();
                },
                success: function(data, textStatus, jqXHR){
                    if (data.newrows) { 
                        str = data.newrows;
                        if(data.csv_error){
                            str += '\n'
                            str += data.csv_error;
                        }  
                        $('#show_msg').html(str).show().siblings().hide();
                        $('#upload-btn').hide();

                        $("input[name=keywords]").trigger('keyup');

                        $this[0].reset();
                    }
                    else{
                        if(data.csv_error){
                            alert(data.csv_error);
                        }

                        if(data.errors) {
                            $('[name=csvfile]')
                                .parent().addClass('error')
                                .siblings('label.error').remove().end()
                                .after(data.errors.csvfile);
                        }
                    }
                    $('#preloader').hide();
                },
                error: function(jqXHR, textStatus, errorThrown){
                    swal('Error: There might be issues while uploading, please check the fields!');
                    $('#preloader').hide();
                }
            });
        }
    })

    $('.reset-upload').on('click', function(){
        var uploadForm = $(this).parent().parent('form');
        uploadForm[0].reset();

        uploadForm.find('label.error').remove();
        uploadForm.find('div.form-line').removeClass('error');

        $('#show_msg').html('').hide().siblings().show();
        $('#upload-btn').show();
    })

    $(document).ready(function(){
        // keywords.trigger('keyup');
        if( $('.double-scroll').length ){
            $('.double-scroll').doubleScroll();
        }    
    });

    $('a.asc_desc').on('click', function(e){
        e.preventDefault();
        var $this = $(this);

        data.order_by = $this.attr('data-column');
        data.asc_or_desc = $this.attr('data-order');

        $('a.asc_desc').find('i').remove();

        if($this.attr('data-order') == 'asc'){
            $this.append('<i class="fa fa-caret-up"></i>');
            $this.attr('data-order', 'desc');
        }
        else{
            $this.append('<i class="fa fa-caret-down"></i>');
            $this.attr('data-order', 'asc');
        }

        keywords.trigger('keyup');
    });    

    $(".search_for_date").on("click", function(){
        
        var phlebo_id = $("#phlebo_id").val();
        var doc_id = $("#doc_id").val();
        var city_id = $("#city_id").val();
        var camp_type_id = $("#camp_type_id").val();
        var camp_status = $("#camp_status").val();
        var zone_id = $("#zone_id").val();
        var region_id = $("#region_id").val();
        var area_id = $("#area_id").val();

        data.page = 0;
        data.search = 1;
        data.token = $('input[name="token"]').val();
        data.from = (from_d.length) ? from_d.val() : '';
        data.to = (to_d.length) ? to_d.val() : '';
        data.keywords = keywords.val();
        data.phlebo_id = phlebo_id ? phlebo_id : '';
        data.doc_id = doc_id ? doc_id : '';
        data.zone_id = zone_id ? zone_id : '';
        data.region_id = region_id ? region_id : '';
        data.area_id = area_id ? area_id : '';
        data.city_id = city_id ? city_id : '';
        data.camp_type_id = camp_type_id ? camp_type_id : '';
        data.camp_status = camp_status ? camp_status : '';

        var query_str = '?xcel=1';

        if(data.keywords !== ''){
            query_str += '&keywords=' + data.keywords;
        }
        if(data.from !== ''){
            query_str += '&from='+data.from;
        }
        if(data.to !== ''){
            query_str += '&to='+data.to;
        }

        if(data.phlebo_id !== ''){
            query_str += '&phlebo_id='+data.phlebo_id;
        }
        if(data.doc_id !== ''){
            query_str += '&doc_id='+data.doc_id;
        }
        if(data.zone_id !== ''){
            query_str += '&zone_id='+data.zone_id;
        }
        if(data.region_id !== ''){
            query_str += '&region_id='+data.region_id;
        }
        if(data.area_id !== ''){
            query_str += '&area_id='+data.area_id;
        }
        if(data.city_id !== ''){
            query_str += '&city_id='+data.city_id;
        }
        if(data.camp_type_id !== ''){
            query_str += '&camp_type_id='+data.camp_type_id;
        }
        if(data.camp_status !== ''){
            query_str += '&camp_status='+data.camp_status;
        }


        var download_url_with_params = baseUrl + download_url + query_str;
        $('a#export').attr('href', download_url_with_params);

        //var url = baseUrl + controller + '/lists/';
        var url = baseUrl + listing_url;

        load_and_clear(url,data);
    });

    $(".search_for_posts").on("click", function(){

        localStorage.clear();
        localStorage.removeItem('main_category_id');
        localStorage.removeItem('category_id');
        localStorage.removeItem('folder_id');
        localStorage.removeItem('sub_category_id');
        localStorage.removeItem('main_category_text');
        localStorage.removeItem('category_text');
        localStorage.removeItem('sub_category_text');

        var main_category_id = $("#main_category_id").val();
        var main_category_text = $("#main_category_id option:selected").text();
        var category_id = $("#category_id").val();
        var category_text = $("#category_id option:selected").text();

        var sub_category_id = $("#sub_category_id").val();
        var sub_category_text = $("#sub_category_id option:selected").text();

        var folder_id = $("#folder_id").val();

        localStorage.setItem('main_category_id', main_category_id);
        localStorage.setItem('category_id', category_id);
        localStorage.setItem('folder_id', folder_id);
        localStorage.setItem('sub_category_id', sub_category_id);
        localStorage.setItem('main_category_text', main_category_text);
        localStorage.setItem('category_text', category_text);
        localStorage.setItem('sub_category_text', sub_category_text);
        
        data.page = 0;
        data.search = 1;
        data.token = $('input[name="token"]').val();
        data.from = (from_d.length) ? from_d.val() : '';
        data.to = (to_d.length) ? to_d.val() : '';
        data.keywords = keywords.val();
        data.main_category_id = main_category_id ? main_category_id : '';
        data.category_id = category_id ? category_id : '';
        data.folder_id = folder_id ? folder_id : '';
        data.sub_category_id = sub_category_id ? sub_category_id : '';

        var query_str = '?xcel=1';

        if(data.keywords !== ''){
            query_str += '&keywords=' + data.keywords;
        }
        if(data.from !== ''){
            query_str += '&from='+data.from;
        }
        if(data.to !== ''){
            query_str += '&to='+data.to;
        }

        if(data.main_category_id !== ''){
            query_str += '&main_category_id='+data.main_category_id;
        }
        if(data.category_id !== ''){
            query_str += '&category_id='+data.category_id;
        }
        if(data.folder_id !== ''){
            query_str += '&folder_id='+data.folder_id;
        }
        if(data.sub_category_id !== ''){
            query_str += '&sub_category_id='+data.sub_category_id;
        }
       

        var download_url_with_params = baseUrl + download_url + query_str;
        $('a#export').attr('href', download_url_with_params);

        //var url = baseUrl + controller + '/lists/';
        var url = baseUrl + searching_url;
        load_and_clear(url,data);
    });

    $(".sort_posts").on("click", function(){
        /*var main_category_id = $("#main_category_id").val();
        var main_category_text = $("#main_category_id option:selected").text();
        var category_id = $("#category_id").val();
        var category_text = $("#category_id option:selected").text();

        var sub_category_id = $("#sub_category_id").val();
        var sub_category_text = $("#sub_category_id option:selected").text();

        var folder_id = $("#folder_id").val();*/
        var main_category_id = $("#main_category_id").val();
        var category_id = $("#category_id").val();
        var sub_category_id = $("#sub_category_id").val();
        var folder_id = $("#folder_id").val();

        data.page = 0;
        data.search = 1;
        data.token = $('input[name="token"]').val();
        /*data.from = (from_d.length) ? from_d.val() : '';
        data.to = (to_d.length) ? to_d.val() : '';
        data.keywords = keywords.val();*/
        data.main_category_id = main_category_id ? main_category_id : '';
        data.category_id = category_id ? category_id : '';
        data.folder_id = folder_id ? folder_id : '';
        data.sub_category_id = sub_category_id ? sub_category_id : '';

        var query_str = '?xcel=1';

        /*if(data.keywords !== ''){
            query_str += '&keywords=' + data.keywords;
        }
        if(data.from !== ''){
            query_str += '&from='+data.from;
        }
        if(data.to !== ''){
            query_str += '&to='+data.to;
        }*/

        if(data.main_category_id !== ''){
            query_str += '&main_category_id='+data.main_category_id;
        }
        if(data.category_id !== ''){
            query_str += '&category_id='+data.category_id;
        }
        if(data.folder_id !== ''){
            query_str += '&folder_id='+data.folder_id;
        }
        if(data.sub_category_id !== ''){
            query_str += '&sub_category_id='+data.sub_category_id;
        }
       
        //var download_url_with_params = baseUrl + download_url + query_str;
        //$('a#export').attr('href', download_url_with_params);

        //var url = baseUrl + controller + '/lists/';
        var url = baseUrl  + controller + '/sort_posts';
        //alert(url);
        load_and_clear1(url,data);
       /* $.ajax({
                    url: url,
                    data: data,
                    type: 'POST',
                    dataType: 'JSON',
                    beforeSend: function(xhr, opts){
                    },
                    success: function(data) {
                        
                        
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                    }
                }) */
    });

    $(".clear_all").on("click", function(){

        $("#from_date").datepicker().val('');
        $("#to_date").datepicker().val('');

        data.page = 0;
        data.search = 1;
        data.token = $('input[name="token"]').val();
        data.from = '';
        data.to = '';
        data.phlebo_id = '';
        data.doc_id = '';
        data.zone_id = '';
        data.region_id = '';
        data.area_id = '';
        data.city_id = '';
        data.camp_type_id = '';
        data.camp_status = '';
        data.div_id = [];

        var url = baseUrl + listing_url;

        load_and_clear(url,data);
    });

    $(".buttons_filter").on("click", function(){
        var id = $(this).attr('id');
        
        if(id!=""){           
            div_id.push(id);    
        }else{
            div_id = [];
        }
        
        data.keywords = keywords.val();
        data.page = 0;
        data.search = 1;
        data.token = $('input[name="token"]').val();
        data.div_id = div_id;

        var query_str = '?xcel=1';

        if(data.keywords !== ''){
            query_str += '&keywords=' + data.keywords;
        }

        if(data.div_id !== ''){
            query_str += '&div_id=' + data.div_id;
        }

        var url = baseUrl + listing_url;

        var download_url_with_params = baseUrl + download_url + query_str;
        $('a#export').attr('href', download_url_with_params);

        load_and_clear(url,data);
    });

    $(document).on("click", ".grid-table-anchor", function(){
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        var from = $(this).attr('data-from');        
        var column = $(this).attr('data-column');

        var url = baseUrl + type + '/listing_ajax';
        
        data.id = id;
        data.type = type;
        data.from = from;
        data.page = 0;
        data.search = 1;
        grid_search(0,1,data,url,column)
    });

    $(document).on('click', '.grid-bullets', function(e){
        
        var id = $(this).closest('div .grid-table').attr('data-id');
        var type = $(this).closest('div .grid-table').attr('data-type');
        var from = $(this).closest('div .grid-table').attr('data-from');

        var url = baseUrl + type + '/listing_ajax';
        
        data.id = id;
        data.type = type;
        data.from = from;

        var count = $(this).attr('data-count');
        var pagecount = $(this).attr('data-page');

        grid_search(count, pagecount, data, url);
    });

    $(document).on('click', ".grid_search_btn",function(){

        var id = $(this).closest('div .grid-table').attr('data-id');
        var type = $(this).closest('div .grid-table').attr('data-type');
        var from = $(this).closest('div .grid-table').attr('data-from');
        data.keywords = $('input[name=search_grid]').val();

        var url = baseUrl + type + '/listing_ajax';
        
        data.id = id;
        data.type = type;
        data.from = from;

        var count = $(this).attr('data-count');
        var pagecount = $(this).attr('data-page');

        grid_search(count, pagecount, data, url);
    });

    $(document).on('click', ".grid_reset_btn",function(){

        var id = $(this).closest('div .grid-table').attr('data-id');
        var type = $(this).closest('div .grid-table').attr('data-type');
        var from = $(this).closest('div .grid-table').attr('data-from');
        data.keywords = '';

        var url = baseUrl + type + '/listing_ajax';
        
        data.id = id;
        data.type = type;
        data.from = from;

        var count = $(this).attr('data-count');
        var pagecount = $(this).attr('data-page');

        grid_search(count, pagecount, data, url);
    });

    $(document).on('click', ".grid_close_btn", function(){
        $('tr.tr-grid').remove();
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
                        search(0,0,'comments');
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                    }
                }) 
            }
        })
    });

    function grid_search(count=0, pagecount, data, url, column){
        
        id = data.id;
        type = data.type;
        from = data.from;

        data.search = 1;        
        data.token = $('input[name="token"]').val();        
        data.page = pagecount;
        grid_keywords = data.keywords;

        $(document).ajaxStart(function(){
            $(window).data("<b>Searching....</b>");
        });

        $.post(url + '/' + count , data , function(data){
            $('tr.tr-grid').remove();
            $("#tr_"+id).after('<tr id="next_'+id+'" class="tr-grid"></tr>');
            $('tr#next_'+id).append('<td colspan="'+column+'"><div class="grid-table" data-id="'+id+'" data-type="'+type+'" data-from="'+from+'">'+data+'</div></td>');
            //$('<td colspan="21"><div class="grid-table" data-id="'+id+'" data-type="'+type+'" data-from="'+from+'"><table>'+data+'</table></div></td>').appendTo($('tr#next_'+id)).slideDown('slow');
            $('tr#next_'+id).attr("colspan", 15); 
            
            if(grid_keywords!=""){
                $('input[name=search_grid]').val(grid_keywords);
                
            }

        });

    }

    $("#filter").on("click", function(){
            $("#div_filter").slideDown(500);
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

     function load_and_clear1(url,data){
        
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            
            success: function(data) {
              
                
                $('#sss').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                //alert('Oops ! there might be some problem, please try after some time');
            }
        });
    }

})(jQuery);