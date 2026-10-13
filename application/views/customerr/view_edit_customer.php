<?php
$this->load->view('header/view_header');
?> 

<!-- Main Content Wrapper -->
<div id="da-content-wrap" class="clearfix">

    <!-- Content Area -->
    <div id="da-content-area">

        <div class="row-fluid">
            <div class="span9">
                <div class="da-panel">
                    <div class="da-panel-header">
                        <span class="da-panel-title"><i class="icol-chart-pie"></i>Edit Customer</span>
                    </div>
                    <div class="da-panel-content">
                        <?php                            
                            if(validation_errors()){
                                echo validation_errors('<div class="da-message error">','</div>');
                            }
                        ?>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url().'customer/update'; ?>">
                            
                            <table class="da-table">
                                <tr>
                                    <th>Category <span class="required"style="font-size:17px;color:red;">*</span></th>
                                    <td>
                                            <?php 
                                                $dropdown_js = 'id="cust_category" style="width:150px;float:left;"';
                                 

                                                echo form_dropdown('cust_category', $category_array, set_value('cust_category', (isset($res->cust_category)) ? $res->cust_category : ''), $dropdown_js);
                                            ?>
                                    </td>
                                </tr>
                               
                                <tr><th>Name <span class="required" style="font-size:17px;color:red;">*</span></th><td><input  class="span12" id="cust_name" name="cust_name" value="<?php echo $res->cust_name; ?>" /></td></tr>

                                <tr><th>Mobile No</th><td><input  class="span12" id="cust_phone" name="cust_phone" value="<?php echo $res->cust_phone; ?>" /></td></tr>
								<tr><th>LAN Phone</th><td><input  class="span12" id="lan_phone" name="lan_phone" value="<?php echo $res->lan_phone; ?>" /></td></tr>

                                <tr><th>Email </th><td><input  class="span12" id="cust_email" name="cust_email" value="<?php echo $res->cust_email; ?>" /></td></tr>

                               <tr>
                                    <th>Date of Birth</th>
                                        <td colspan="3">
                                            <?php
                                            if(!empty($res->date_of_birth)){
                                                $date_of_birth_array = explode("-",$res->date_of_birth);
                                                //print_r($date_of_birth_array);
                                                //echo $date_of_birth_array[0];
                                            }else{
                                                $date_of_birth_array[0] = "";
                                                $date_of_birth_array[1] = "";
                                                $date_of_birth_array[2] = "";
                                            }
                                            
                                            ?>
                                           <?php 
                                                $dropdown_js = 'id="dob_year" style="width:100px;float:left;"';
                                                echo form_dropdown('dob_year', $year_array,set_value('dob_year', (isset($date_of_birth_array[0])) ? $date_of_birth_array[0] : ''), $dropdown_js);
                                            ?>
                                            <?php 
                                                $dropdown_js = 'id="dob_month" style="width:100px;float:left;"';
                                                echo form_dropdown('dob_month', $month_array,set_value('dob_year', (isset($date_of_birth_array[1])) ? $date_of_birth_array[1] : ''), $dropdown_js);
                                            ?>
                                            <?php 
                                                $dropdown_js = 'id="dob_day" style="width:100px;float:left;"';
                                                echo form_dropdown('dob_day', $day_array,set_value('dob_year', (isset($date_of_birth_array[2])) ? $date_of_birth_array[2] : ''), $dropdown_js);
                                            ?>

                                           
                                    </td>
                                </tr>

                                <tr><th>Working Place </th><td><input  class="span12" id="working_place" name="working_place" value="<?php echo $res->working_place; ?>" /></td></tr>

                                <tr>
                                    <th>Designation</th>
                                    <td>
                                            <?php 
                                                $dropdown_js = 'id="cust_designation" style="width:150px;float:left;"';
                                                 echo form_dropdown('cust_designation', $designation_array, set_value('cust_designation', (isset($res->cust_designation)) ? $res->cust_designation : ''), $dropdown_js);
                                            ?>
                                    </td>
                                </tr>

                                <tr><th>Special Achivement </th><td><input  class="span12" id="special_achivement" name="special_achivement" value="<?php echo $res->special_achivement; ?>" /></td></tr>

                                <tr><th>Present Address </th><td><input  class="span12" id="present_address" name="present_address" value="<?php echo $res->present_address; ?>" /></td></tr>

                                <tr><th>Permanent Address </th><td><input  class="span12" id="permanent_address" name="permanent_address" value="<?php echo $res->permanent_address; ?>" /></td></tr>
                                                  
                                <tr>
                                    <th>Status <span class="required"style="font-size:17px;color:red;">*</span></th>
                                    <td colspan="">
                                            <?php 
                                                $dropdown_js = 'id="cust_status" style="width:100px;" onchange="myFunction();"';
                                                echo form_dropdown('cust_status', $cust_status_type, set_value('cust_status', (isset($res->cust_status)) ? $res->cust_status : ''), $dropdown_js);
                                            ?>
                                        </td>
                                </tr>                                                    
                                <tr>
                                    <td colspan="3">
                                        <input type="hidden" name="auto_id" id="auto_id" value="<?php echo $res->cust_id;?>">
                                        <input type="submit" name="" value="UPDATE" class="btn btn-success"/> 
                                    </td>
                                </tr>                
                            </table>                
                                            
                        </form>                                       
                    </div>
                </div>
            </div>  
           
        </div>

        
    </div>
    <!-- End Content Area -->
</div>
<!-- End Main Content Wrapper -->
<?php
$this->load->view('footer/view_footer');
?>    