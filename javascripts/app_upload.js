 $(document).ready(function() { 
        //elements
        var progressbox 	= $('#progressbox1');
        var progressbar 	= $('#progressbar1');
        var statustxt 		= $('#statustxt1');
        var submitbutton 	= $("#SubmitButton1");
        var myform1 		= $("#UploadForm1");
        var output 		= $("#output1");
        var completed 		= '0%';

        output.empty();
        
        $(myform1).ajaxForm({
           dataType:  'json', 
            beforeSend: function() { //brfore sending form
                submitbutton.attr('disabled', ''); // disable upload button
                statustxt.empty();
                progressbox.show(); //show progressbar
                progressbar.width(completed); //initial value 0% of progressbar
                statustxt.html(completed); //set status text
                statustxt.css('color','#000'); //initial color of status text
            },
            uploadProgress: function(event, position, total, percentComplete) { //on progress
                progressbar.width(percentComplete + '%') //update progressbar percent complete
                statustxt.html(percentComplete + '%'); //update status text
                if(percentComplete>50)
                {
                    statustxt.css('color','#fff'); //change status text to white after 50%
                }
            },
            complete: function(response) { // on complete

                myform1.resetForm();  // reset form
                submitbutton.removeAttr('disabled'); //enable submit button
                progressbox.hide(); // hide progressbar
             
                var obj = jQuery.parseJSON(response.responseText);
                                   
                if(obj.first == "invalid_limit"){
                    output.html("Limit is 4MB For Image and 50MB for Video"); //update element with received data
                }else if(obj.first =="invalid_file"){
                    output.html("Invalid File Type"); //update element with received data
                }else{
                   // location.href= site_url_path+'dashboard/next/'+response.responseText;

                   var imageId = obj.id;
                   $('#hidden_media_id').val(imageId);
                   $("#upload_media_intro_text").hide();
                  var myImage = "";
                  if(obj.type=="video"){
                        myImage = "processing video...<br><br><img src=\""+obj.first+"\" alt=\"IMAGE\">";
                   }else{
                        myImage = "<br><br><img src=\""+obj.first+"\" alt=\"IMAGE\">";
                   } 
                   $("#first_image_placeholder").html(myImage);
                   $("#div_image_del_link").html("<a href=\"#\" onclick=\"return deleteMedia('"+imageId+"');\">DELETE</a>");
                   $("#first_image_uploader").hide();
                   //$("#popup_photo_div_id_inner").html(myImage);
                  // $("#hidden_image_id").val(imageId);
                    output.empty();
                }
            }
        });
        
        
        var progressbox2 	= $('#progressbox2');
        var progressbar2 	= $('#progressbar2');
        var statustxt2 		= $('#statustxt2');
        var submitbutton2 	= $("#SubmitButton2");
        var myform2 		= $("#UploadForm2");
        var output2 		= $("#output2");
        var completed2 		= '0%';

        output2.empty();
        
        $(myform2).ajaxForm({
           dataType:  'json', 
            beforeSend: function() { //brfore sending form
                submitbutton2.attr('disabled', ''); // disable upload button
                statustxt2.empty();
                progressbox2.show(); //show progressbar
                progressbar2.width(completed2); //initial value 0% of progressbar
                statustxt2.html(completed2); //set status text
                statustxt2.css('color','#000'); //initial color of status text
            },
            uploadProgress: function(event, position, total, percentComplete) { //on progress
                progressbar2.width(percentComplete + '%') //update progressbar percent complete
                statustxt2.html(percentComplete + '%'); //update status text
                if(percentComplete>50)
                {
                    statustxt2.css('color','#fff'); //change status text to white after 50%
                }
            },
            complete: function(response) { // on complete

                myform2.resetForm();  // reset form
                submitbutton2.removeAttr('disabled'); //enable submit button
                progressbox2.hide(); // hide progressbar
             
                var obj = jQuery.parseJSON(response.responseText);
                                   
                if(obj.first == "invalid_limit"){
                    output2.html("Limit is 4MB"); //update element with received data
                }else if(obj.first =="invalid_file"){
                    output2.html("Invalid File Type"); //update element with received data
                }else{
                   // location.href= site_url_path+'dashboard/next/'+response.responseText;

                   var imageId = obj.id;
                   var myImage = "";
                  if(obj.type=="video"){
                        myImage = "processing video...<br><br><img src=\""+obj.first+"\" alt=\"IMAGE\">";
                   }else{
                        myImage = "<br><br><img src=\""+obj.first+"\" alt=\"IMAGE\">";
                   }                   
                   $("#second_image_placeholder").html(myImage);
                   $("#second_image_uploader").hide();
                   //$("#popup_photo_div_id_inner").html(myImage);
                  // $("#hidden_image_id").val(imageId);
                    output2.empty();
                }
            }
        });    
        
        
        var progressbox3	= $('#progressbox3');
        var progressbar3 	= $('#progressbar3');
        var statustxt3 		= $('#statustxt3');
        var submitbutton3 	= $("#SubmitButton3");
        var myform3 		= $("#UploadForm3");
        var output3 		= $("#output3");
        var completed3 		= '0%';

        output3.empty();
        
        $(myform3).ajaxForm({
           dataType:  'json', 
            beforeSend: function() { //brfore sending form
                submitbutton3.attr('disabled', ''); // disable upload button
                statustxt3.empty();
                progressbox3.show(); //show progressbar
                progressbar3.width(completed3); //initial value 0% of progressbar
                statustxt3.html(completed3); //set status text
                statustxt3.css('color','#000'); //initial color of status text
            },
            uploadProgress: function(event, position, total, percentComplete) { //on progress
                progressbar3.width(percentComplete + '%') //update progressbar percent complete
                statustxt3.html(percentComplete + '%'); //update status text
                if(percentComplete>50)
                {
                    statustxt3.css('color','#fff'); //change status text to white after 50%
                }
            },
            complete: function(response) { // on complete

                myform3.resetForm();  // reset form
                submitbutton3.removeAttr('disabled'); //enable submit button
                progressbox3.hide(); // hide progressbar
             
                var obj = jQuery.parseJSON(response.responseText);
                                   
                if(obj.first == "invalid_limit"){
                    output3.html("Limit is 4MB"); //update element with received data
                }else if(obj.first =="invalid_file"){
                    output3.html("Invalid File Type"); //update element with received data
                }else{
                   // location.href= site_url_path+'dashboard/next/'+response.responseText;

                   var imageId = obj.id;
                   var myImage
                   if(obj.type=="video"){
                        myImage = "processing video...<br><br><img src=\""+obj.first+"\" alt=\"IMAGE\">";
                   }else{
                        myImage = "<br><br><img src=\""+obj.first+"\" alt=\"IMAGE\">";
                   }
                   
                   $("#third_image_placeholder").html(myImage);
                   $("#third_image_uploader").hide();
                   //$("#popup_photo_div_id_inner").html(myImage);
                  // $("#hidden_image_id").val(imageId);
                    output3.empty();
                }
            }
        }); 
        
    });

