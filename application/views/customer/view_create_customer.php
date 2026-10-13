<?php
$this->load->view('header/view_header');
?> 

<!-- Main Content Wrapper -->
<div id="da-content-wrap" class="clearfix">
    <?php
        if (validation_errors()) {
            echo validation_errors('<div class="da-message error">', '</div>');
        }

        if ($this->session->flashdata('flashOK')) {
            echo"<div class=\"da-message success\">";
            echo $this->session->flashdata('flashOK');
            echo"</div>";
        }
        if ($this->session->flashdata('flashError')) {
            echo"<div class=\"da-message error\">";
            echo $this->session->flashdata('flashError');
            echo"</div>";
        }
    ?>
    <!-- Content Area -->
    <div id="da-content-area">

        <div class="row-fluid">
            <div class="span9">
                
                <div class="da-panel">
                    <div class="da-panel-header">
                        <span class="da-panel-title"><i class="icol-chart-pie"></i>Create Customer</span>
                    </div>
                    <div class="da-panel-content">
                        
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url() . 'customer/save'; ?>">
                            
                            <table class="da-table">
                                <tr>
                                    <td>Customer Category <span class="required"style="font-size:17px;color:red;">*</span></td>
                                    <td>
                                            <?php 
                                                $dropdown_js = 'id="cust_category" style="width:150px;float:left;"';
                                                echo form_dropdown('cust_category', $category_array,'', $dropdown_js);
                                            ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Customer Name <span class="required"style="font-size:17px;color:red;">*</span></td>
                                        <td colspan="3">
                                            <input type="text" name="cust_name" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile No1</td>
                                        <td colspan="3">
                                            <input type="text" name="cust_phone" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile No2</td>
                                        <td colspan="3">
                                            <input type="text" name="cust_phone2" value="" style="width:350px;">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Mobile No3</td>
                                        <td colspan="3">
                                            <input type="text" name="cust_phone3" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile No4</td>
                                        <td colspan="3">
                                            <input type="text" name="cust_phone4" value="" style="width:350px;">
                                    </td>
                                </tr>
								<tr>
                                    <td>LAN Phone</td>
                                        <td colspan="3">
                                            <input type="text" name="lan_phone" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                        <td colspan="3">
                                            <input type="email" name="cust_email" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                        <td colspan="3">
                                            <?php 
                                                $dropdown_js = 'id="dob_year" style="width:100px;float:left;"';
                                                echo form_dropdown('dob_year', $year_array,'', $dropdown_js);
                                            ?>
                                            <?php 
                                                $dropdown_js = 'id="dob_month" style="width:100px;float:left;"';
                                                echo form_dropdown('dob_month', $month_array,'', $dropdown_js);
                                            ?>
                                            <?php 
                                                $dropdown_js = 'id="dob_day" style="width:100px;float:left;"';
                                                echo form_dropdown('dob_day', $day_array,'', $dropdown_js);
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Working Place</td>
                                        <td colspan="3">
                                            <input type="text" name="working_place" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Designation</td>
                                    <td>
                                            <?php 
                                                $dropdown_js = 'id="cust_designation" style="width:150px;float:left;"';
                                                echo form_dropdown('cust_designation', $designation_array,'', $dropdown_js);
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Special Achivement</td>
                                        <td colspan="3">
                                            <input type="text" name="special_achivement" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Present Address</td>
                                        <td colspan="3">
                                            <input type="text" name="present_address" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Permanent Address</td>
                                        <td colspan="3">
                                            <input type="text" name="permanent_address" value="" style="width:350px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status <span class="required"style="font-size:17px;color:red;">*</span></td>
                                    <td colspan="">
                                            <?php 
                                                $dropdown_js = 'id="cust_status" style="width:100px;" onchange="myFunction();"';
                                                echo form_dropdown('cust_status', $cust_status_type,'', $dropdown_js);
                                            ?>
                                        </td>
                                </tr>
                                

                                <tr><td colspan="3"><input type="submit" name="" value="SAVE" class="btn btn-success"/> </td></tr>                
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