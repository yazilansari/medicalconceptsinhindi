$(document).ready(function(){
    $(".report_data_formatter").on("change", function(){
  
        var value = $(this).val();
        var type = $(this).attr('data-type');
        var id = $(this).attr('data-id');
        
        var data_arr = {};
        data_arr.value = value;
        data_arr.type = type;
        data_arr.id = id;
  
        //var div_test =  $(this).parent().next('div').children('div').attr('id'); 
        
        $.ajax({
          url: baseUrl + 'reports/data_formatting_for_charts',
          data: data_arr,
          type: 'POST',
          dataType:'JSON',
          success: function(data, textStatus, jqXHR){
            
            if(data.success=="0"){
              var result_arr = data.result[id];
                if(id=="division_patient_count"){
                    division_patient_count.dataProvider = result_arr;
                    division_patient_count.validateData();   
                }
  
                if(id=="region_wise_patient"){
                    region_wise_patient.dataProvider = result_arr;
                    region_wise_patient.validateData();   
                }
  
                if(id=="camp_type_wise_patient"){
                    camp_type_wise_patient.dataProvider = result_arr;
                    camp_type_wise_patient.validateData();
                }
  
                if(id=="below_normal_range"){
                    below_normal_range.dataProvider = result_arr;
                    below_normal_range.validateData();
                }
  
                if(id=="above_normal_range"){
                    above_normal_range.dataProvider = result_arr;
                    above_normal_range.validateData();
                }
  
                if(id=="within_normal_range"){
                    within_normal_range.dataProvider = result_arr;
                    within_normal_range.validateData();
                }

                if(id=="phlebo_camp_total"){
                    phlebo_camp_total.dataProvider = result_arr;
                    phlebo_camp_total.validateData();
                }

                if(id=="phlebo_camp_exe_comp"){                  
                    phlebo_camp_exe_comp.dataProvider = result_arr;
                    phlebo_camp_exe_comp.validateData();
                }

                if(id=="rsm_total_camp"){                  
                    rsm_total_camp.dataProvider = result_arr;
                    rsm_total_camp.validateData();
                }
               
            }else{
  
              $(".report_data_formatter").val('');
  
              swal({ 
                    title: 'No Data!', 
                    text: data.message
                  });
            }
  
          }
        });
    });
  });