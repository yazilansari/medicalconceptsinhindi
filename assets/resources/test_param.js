$(document).ready(function(){

	$(".remove_bal_field1").on("click", function(){
		
		var data_field = $(this).attr('data-field');
		
        var formData = {};
        formData['type_indication_id'] = data_field;
        formData[csrfName] = csrfHash;

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
                
                $.ajax({
                    url: base_url+controller+'/delete_field',
                    data: {'type_indication_id' : data_field},
                    type: 'POST',
                    dataType: 'JSON',
                    beforeSend: function(xhr, opts){
                    },
                    success: function(data) {

                        if(data.msg){
                        	$('div .li_' + data_field).remove();
                            swal('Deleted!', data.msg)             
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                    }
                }) 
            }
        })
		
	});
});