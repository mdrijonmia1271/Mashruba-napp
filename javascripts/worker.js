/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getDistricttByAjax(paramUrl) {
   
    var appUrl = paramUrl;
    var valore = $("#division").val();
//    $("#district").find("option").remove();
    //$("#upazilla").find("option").remove();

//    if (valore == '') {
//        return false;
//    }
    $.ajax({
        url: appUrl + "ajax_get_district",
        beforeSend: function(data) {
            //  $("#your_span").show('slow');
        },
        global: false,
        type: "POST",
        //async: false,
        dataType: "html",
        data: "division_id=" + valore, //the name of the $_POST variable and its value
        success: function(response) //'response' is the output provided by the controller method prova()
        {
            $('#show_my_district').html(response);   
//            //counts the number of dynamically generated options
//            var dynamic_options = $("*").index($('.dynamic')[0]);
//            //removes previously dynamically generated options if they exists (not equal to 0)
//            if (dynamic_options != (-1))
//            $(".dynamic").remove();
//            $("#district").append(response);
//            $(".first").attr({selected: ' selected'});
        }

    });
    // $("#your_span").hide('slow');// end animation
    return false;

}

function getUpazallaByAjax(paramUrl) {
    var appUrl = paramUrl;
    var valore = $("#district").val();

    $.ajax({
        url: appUrl + "ajax_get_upazila",
        beforeSend: function(data) {
        },
        global: false,
        type: "POST",
        //async: false,
        dataType: "html",
        data: "district_id=" + valore, //the name of the $_POST variable and its value
        success: function(response) //'response' is the output provided by the controller method prova()
        {
            $('#show_my_upazila').html(response);
        }
    });
    return false;
}

function getUpazallaByAjaxAns(paramUrl){
	var appUrl = paramUrl;
	var valore = $("#answerer_district").val();
	$("#answerer_upazilla").find("option").remove();
 
	if(valore == ''){
		return false;
	}
    $.ajax({
           url: appUrl+"ajax_get_upazalla_ans",
			beforeSend : function (data) {
                       //  $("#your_span").show('slow');
            },
           global: false,
           type: "POST",
           async: false,
           dataType: "html",
           data: "district_id="+ valore, //the name of the $_POST variable and its value
           success: function (response) //'response' is the output provided by the controller method prova()
                       {
                       //counts the number of dynamically generated options
                       var dynamic_options = $("*").index( $('.dynamic')[0] );
                    //removes previously dynamically generated options if they exists (not equal to 0)
                       if ( dynamic_options != (-1)) $(".dynamic").remove();
                    $("#answerer_upazilla").append(response);
                    $(".first").attr({selected: ' selected'});
               
                   }

          });
    // $("#your_span").hide('slow');// end animation
          return false

}



function getUnitByAjax(paramUrl) {
   
    var appUrl = paramUrl;
    var valore = $("#department_id").val();

    $.ajax({
        url: appUrl + "ajax_get_unit",
        beforeSend: function(data) {
            //  $("#your_span").show('slow');
        },
        global: false,
        type: "POST",
        //async: false,
        dataType: "html",
        data: "data_department_id=" + valore, //the name of the $_POST variable and its value
        success: function(response) //'response' is the output provided by the controller method prova()
        {
            $('#show_my_unit').html(response);
        }

    });
    // $("#your_span").hide('slow');// end animation
    return false;

}


function getMedicineSubspecialityUnitByAjax(paramUrl) {
   
    var appUrl = paramUrl;
    var valore = $("#medicine_subspeciality_id").val();

    $.ajax({
        url: appUrl + "ajax_get_medicine_subspeciality_unit",
        beforeSend: function(data) {
            //  $("#your_span").show('slow');
        },
        global: false,
        type: "POST",
        //async: false,
        dataType: "html",
        data: "data_medicine_subspeciality_id=" + valore, //the name of the $_POST variable and its value
        success: function(response) //'response' is the output provided by the controller method prova()
        {
            $('#show_my_unit').html(response);
        }

    });
    // $("#your_span").hide('slow');// end animation
    return false;

}




function getSurgerySubspecialityUnitByAjax(paramUrl) {
   
    var appUrl = paramUrl;
    var valore = $("#surgery_subspeciality_id").val();

    $.ajax({
        url: appUrl + "ajax_get_surgery_subspeciality_unit",
        beforeSend: function(data) {
            //  $("#your_span").show('slow');
        },
        global: false,
        type: "POST",
        //async: false,
        dataType: "html",
        data: "data_surgery_subspeciality_id=" + valore, //the name of the $_POST variable and its value
        success: function(response) //'response' is the output provided by the controller method prova()
        {
            $('#show_my_unit').html(response);
        }

    });
    // $("#your_span").hide('slow');// end animation
    return false;

}



function getGynaecologySubspecialityUnitByAjax(paramUrl) {
   
    var appUrl = paramUrl;
    var valore = $("#gynaecology_subspeciality_id").val();

    $.ajax({
        url: appUrl + "ajax_get_gynaecology_subspeciality_unit",
        beforeSend: function(data) {
            //  $("#your_span").show('slow');
        },
        global: false,
        type: "POST",
        //async: false,
        dataType: "html",
        data: "data_gynaecology_subspeciality_id=" + valore, //the name of the $_POST variable and its value
        success: function(response) //'response' is the output provided by the controller method prova()
        {
            $('#show_my_unit').html(response);
        }

    });
    // $("#your_span").hide('slow');// end animation
    return false;

}




function getNeonatologySubspecialityUnitByAjax(paramUrl) {
   
    var appUrl = paramUrl;
    var valore = $("#neonatology_subspeciality_id").val();

    $.ajax({
        url: appUrl + "ajax_get_neonatology_subspeciality_unit",
        beforeSend: function(data) {
            //  $("#your_span").show('slow');
        },
        global: false,
        type: "POST",
        //async: false,
        dataType: "html",
        data: "data_neonatology_subspeciality_id=" + valore, //the name of the $_POST variable and its value
        success: function(response) //'response' is the output provided by the controller method prova()
        {
            $('#show_my_unit').html(response);
        }

    });
    // $("#your_span").hide('slow');// end animation
    return false;

}













function getACDMSubjectByAjax(paramUrl) {
    var appUrl = paramUrl;
    var valore = $("#acdm_batch_id").val();

    $.ajax({
        url: appUrl + "ajax_get_acdm_subject",
        beforeSend: function(data) {
        },
        global: false,
        type: "POST",
        //async: false,
        dataType: "html",
        data: "data_acdm_batch_id=" + valore, //the name of the $_POST variable and its value
        success: function(response) //'response' is the output provided by the controller method prova()
        {
            $('#show_my_acdm_subject').html(response);
        }
    });
    return false;
}

function change_by_index_no() 
{   
    
    var data_index_no = $("#index_no").val();
    
    $.ajax({ 
        type: "POST",
        url: site_url_path+'participant/auto_data_by_index_no',
        dataType: "json",
        data: "index_no="+data_index_no,
        
        success: function(result) 
        { 
            $("#MPO_NO").val(result.DATA_INDEX_NO);
            $("#P_NAME").val(result.DATA_FULLNAME);
            $("#DESIGNATION").val(result.DATA_DESIG_NAME);
            $("#SUBJECT_TMIS").val(result.DATA_SUB_NAME);
            $("#INSTITUTION_NAME").val(result.DATA_COL_NAME);
            $("#PERMANENT_ADDRESS").val(result.DATA_PAR_ADDRESS);
            $("#DIVISION").val(result.DATA_DIVISION);
            $("#DISTRICT").val(result.DATA_DISTRICT);
            $("#da-from-datepicker").val(result.DATA_JOING_DATE);
            $("#EMAIL").val(result.DATA_EMAIL);
            $("#MOBILE").val(result.DATA_MOBILE);
            $("#da-to-datepicker").val(result.DATA_BIRTH_DATE);
        }
        
    });
}


var counter_facilitator = 1;
function addMoreFacilitator(){
    var newRow = '<tr id="facilitator_tbl_row_'+counter_facilitator+'"><td><input type="text" name="facilitator_name[]" size="10" style="width:120px;"></td><td><input type="text" name="facilitator_nid[]" size="10" style="width:100px;"></td><td><input type="text" name="facilitator_designation[]" size="10" style="width:100px;"></td><td><div class="box drop"><input type="text" name="duration_hospital[]" value="" class="span10">rt</div><div class="box others"><input type="text" name="duration_hospital[]" value="" class="span10"></div></td><td class="da-icon-column"><a href="javascript:void(0);" onclick="removeFacilitatorRow('+counter_facilitator+')"><i class="icol-cross"></i></a></td></tr>';
    $("#facilitator_grid").append(newRow);
    counter_facilitator++;
    return false;
}

function removeFacilitatorRow(id){
     $("#facilitator_tbl_row_"+id).remove();
     return false
}







var counter_resource = 1;

function addMoreResource(){
	
  $.ajax({
        url: siteHost()+"dc/get_resource_person_item",
        beforeSend : function (data) {
        },
        type: "POST",
        dataType: "html",
        data: "counter_resource="+counter_resource,
        success: function (response)
        {
            $("#resource_grid").append(response);
        }

    }); 
    counter_resource++;
return false;    
}



function removeResource(id){
    $("#resource_row_"+id).remove();
    return false;
}


 



