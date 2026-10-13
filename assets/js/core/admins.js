function show_user_details(user_id){
    
    $.ajax({
        url: siteHost()+"users/details",
        beforeSend : function (data) {
        },
        type: "POST",
        dataType: "html",
        data: "user_id="+user_id,
        success: function (response)
        {
            $('#user_details').html(response)
        }

    });

}

function validate_vote_option(){
//    if($("#priority").val() == 0){
//        $("#priority_info").html("<font color=\"red\">Please Select Priority</font>");
//        return false;
//    }else{
//        $("#priority_info").html("");
//        return true;
//    }

return true;
}

function closeUserDetails(){
    $("#user_details").empty();
}

function closeArticleDetails(){
    $("#article_details").empty();
}

function show_article_details(article_id){
    
    $.ajax({
        url: siteHost()+"articles/show_articles_details",
        beforeSend : function (data) {
        },
        type: "POST",
        dataType: "html",
        data: "article_id="+article_id,
        success: function (response)
        {
            $('#article_details').html(response)
        }

    });    
}


setInterval("loadLatestArticleData();", 300000 );//5min 300000   1min  60000
 function loadLatestArticleData(){
     var link = siteHost()+"dashboard/get_latest_article";
     
        $.ajax({
            url: link,
            type: "POST",
            dataType: "html",
            beforeSend: function(){
                          
            },
              success: function(response) {
                    $("#my_latest_artcile_ajax").html(response);              
             }
        });    
 }
 
 
 function DeleteConfirm(){
    var conf = confirm("ARE YOU SURE YOU WANT TO DELETE THIS ARTICLE?");
    if (conf == true)
    {
        return true;
    }
    else
    {
        return false;
    }     
  
 }
 
 
 
 
 
 
 
var counter_participent = 1;
function addMoreParticipant(){
  $.ajax({
        url: siteHost()+"training/get_participent_person_item",
        beforeSend : function (data) {
        },
        type: "POST",
        dataType: "html",
        data: "counter_participent="+counter_participent,
        success: function (response)
        {
            $("#participant_grid").append(response);
           // $("#div_program_list_holder").show();
        }

    }); 
    counter_participent++;
return false;      
}

var counter_resource = 1;
function addMoreResource(){
  $.ajax({
        url: siteHost()+"training/get_resource_person_item",
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

function removeParticipant(id){
    $("#participant_row_"+id).remove();
    return false;
}

function removeResource(id){
    $("#resource_row_"+id).remove();
    return false;
}

var counter_file_schedule = 1;
function addMoreCourseScheduleFile(){
    var newRow = '<tr id="course_schedule_file_row_'+counter_file_schedule+'"><td><input type="file" name="course_schedule_file_name[]" size="10" ></td><td><input type="text" name="course_schedule_file_title[]" ></td><td class="da-icon-column"><a href="javascript:void(0);" onclick="removeMoreCourseScheduleFile('+counter_file_schedule+')"><i class="icol-cross"></i></a></td> </tr>';
    $("#course_schedule_file").append(newRow);
    counter_file_schedule++;
    return false;
}

function removeMoreCourseScheduleFile(id){
     $("#course_schedule_file_row_"+id).remove();
    return false;    
}

var counter_file_handouts = 1;
function addMoreHandoutsFile(){
    var newRow = '<tr id="handouts_file_name_row_'+counter_file_handouts+'"><td><input type="file" name="handouts_file_name[]"></td><td><input type="text" name="handouts_file_title[]"></td><td class="da-icon-column"><a href="javascript:void(0);" onclick="removeMoreHandoutsFile('+counter_file_handouts+')"><i class="icol-cross"></i></a></td></tr>';
     $("#tbl_handouts_file").append(newRow);
    counter_file_handouts++;
    return false;
} 

function removeMoreHandoutsFile(id){
     $("#handouts_file_name_row_"+id).remove();
     return false;     
}

var counter_facilitator = 1;
function addMoreFacilitator(){
    var newRow = '<tr id="facilitator_tbl_row_'+counter_facilitator+'"><td><input type="text" name="facilitator_name[]" size="10" style="width:120px;"></td><td><input type="text" name="facilitator_nid[]" size="10" style="width:100px;"></td><td><input type="text" name="facilitator_designation[]" size="10" style="width:100px;"></td><td><input type="text" name="facilitator_address[]" style="width:100px;"></td><td><input type="text" name="facilitator_mobile[]" style="width:100px;"></td><td class="da-icon-column"><a href="javascript:void(0);" onclick="removeFacilitatorRow('+counter_facilitator+')"><i class="icol-cross"></i></a></td></tr>';
    $("#facilitator_grid").append(newRow);
    counter_facilitator++;
    return false;
}

function removeFacilitatorRow(id){
     $("#facilitator_tbl_row_"+id).remove();
     return false
} 
 