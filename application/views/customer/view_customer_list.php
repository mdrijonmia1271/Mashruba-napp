<?php
$this->load->view('header/view_header');
?> 
<!-- Main Content Wrapper -->
<div id="da-content-wrap" class="clearfix">
    
    <!-- Content Area -->
    <div id="da-content-area">
        <!-- Start view code-->   
        <div class="row-fluid">
            <div class="span12">
                
                <div class="da-panel">
                    <div class="da-panel-header">
                        <span class="da-panel-title"><i class="icon-list"></i>Customer Search Wizard</span>
                    </div>
                    <div class="da-panel-content">
                        
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url().'customer/records'; ?>">
                            
                            <table class="da-table">

                                <tr>
                                    <th>Customer Category</th>
                                    <td>
                                            <?php 
                                                $dropdown_js = 'id="cust_category" style="width:150px;float:left;"';
                                                echo form_dropdown('cust_category', $category_array,'', $dropdown_js);
                                            ?>
                                    </td>
                                    <th>Customer Name</th>
                                    <td>
                                        <input type="text" name="cust_name" value="" class="span12">
                                    </td>
                                    <th>Desigmation</th>
                                    <td>
                                            <?php 
                                                $dropdown_js = 'id="cust_designation" style="width:150px;float:left;"';
                                                echo form_dropdown('cust_designation', $designation_array,'', $dropdown_js);
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone1</th>
                                    <td>
                                        <input type="text" name="cust_phone" value="" class="span12">
                                    </td>
                            
                                    <th>Email</th>
                                    <td>
                                        <input type="text" name="cust_email" value="" class="span12">
                                    </td>
                                    <th>Status</th>
                                    <td>
                                            <?php 
                                                $dropdown_js = 'id="cust_status" style="width:150px;float:left;"';
                                                echo form_dropdown('cust_status', $cust_status_type,'', $dropdown_js);
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                   
                                    <th>Customer Has Email / Phone</th>
                                    <td>
                                            <?php 
                                                $dropdown_js = 'id="has_email_phone" style="width:150px;float:left;"';
                                                echo form_dropdown('has_email_phone', $has_email_phone_array,'', $dropdown_js);
                                            ?>
                                    </td>

									<th>Working Place</th>
									<td colspan="5">
										<input type="text" name="working_place" value="" class="span12">
									</td>
                                </tr>
                                <tr>
                                   
                                    <th>Customer DOB</th>
                                    
                                    <th>Date From</th>
                                    <td>
                                        <?php 
                                            $dropdown_js = 'id="from_dob_month" style="width:80px;float:left;"';
                                            echo form_dropdown('from_dob_month', $month_array,'', $dropdown_js);
                                        ?>
                                        <?php 
                                            $dropdown_js = 'id="from_dob_day" style="width:80px;float:left;"';
                                            echo form_dropdown('from_dob_day', $day_array,'', $dropdown_js);
                                        ?>
                                    </td>
                                    <th>Date To</th>
                                    <td colspan="2">
                                        <?php 
                                            $dropdown_js = 'id="to_dob_month" style="width:80px;float:left;"';
                                            echo form_dropdown('to_dob_month', $month_array,'', $dropdown_js);
                                        ?>
                                        <?php 
                                            $dropdown_js = 'id="to_dob_day" style="width:80px;float:left;"';
                                            echo form_dropdown('to_dob_day', $day_array,'', $dropdown_js);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <input type="submit" name="search" value="Search" class="btn btn-success btn-large"/> 
                                    </td>
                                </tr>                
                            </table>                

                        </form>                                       
                    </div>
                </div>
            </div>  

        </div>
        <div class="row-fluid">
            
            <div class="span12">
                <div class="da-panel collapsible">

                    <div class="da-panel-header">
                        <span class="da-panel-title">
                            <i class="icon-list"></i> Customer List (<?php echo $total_rows;?>)
                        </span>                    
                        <br>
                    </div>
                    <div class="da-panel-content da-table-container">
                        <?php
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
                        <table id="files"></table>
                        <table id="da-ex-datatable-numberpaging" class="da-table" id="zip_file_list">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Working Place</th>
                                    <th>Phone1</th>
                                    
                                    <th>Lan_Phone</th> 
                                    <th>Email</th> 
                                    <th style="width:9%;">DOB</th>
                                    <th>Designation</th> 
                                  
                                    <th>Status</th> 
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($rec)) {

                                    foreach ($rec as $key => $value) {
                                        ?>
                                        <tr>
                                            
                                            <td><?php 
                                            echo $name = get_name_by_auto_id('category',$value->cust_category,'name');
                                            
                                            ?></td>
                                            <td style="white-space:nowrap;"><?php echo $value->cust_name; ?></td>
                                            <td style="white-space:nowrap;"><?php echo $value->working_place; ?></td>

                                           
                                            <td><?php echo $value->cust_phone; ?></td>
                                            
                                            <td><?php echo $value->lan_phone; ?></td>
                                            <td><?php echo $value->cust_email; ?></td>
                                            <td style="width:9%;">
                                                <?php 
                                                if($value->date_of_birth == "0000-00-00" or $value->date_of_birth == ""){
                                                    echo "";
                                                }else{
                                                    echo date('d-M-Y',strtotime($value->date_of_birth));
                                                }
                                                ?>
                                                </td>
                                            
                                            <td><?php 
                                            echo $name = get_designation_by_auto_id('designation',$value->cust_designation,'name');
                                            
                                            ?></td>
                                            
                                            
                                            
                                            <td>
                                                <?php 
                                                echo get_status_name_by_type($value->cust_status);
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <p><a class="btn" href="<?php echo base_url().'customer/edit/'.$value->cust_id; ?>"><i class="icol-pencil"></i> EDIT</a></p>

                                            </td>
                                            <td>
                                                <p><a class="btn" href="<?php echo base_url().'customer/view/'.$value->cust_id; ?>"><i class="icol-pencil"></i> VIEW</a></p>

                                            </td>

                                            <?php
                                            echo"</tr>";
                                        }
                                        echo '<tr><td colspan="10" class=""><font size="6px">' . $links . '</font></td></tr>';
                                    } else {
                                        echo '<tr><td colspan="10" align="center">No Data Available</td></tr>';
                                    }
                                    ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> 
        <!-- End view code-->    
    </div>
    <!-- End Content Area -->
</div>
<!-- End Main Content Wrapper -->
<?php
$this->load->view('footer/view_footer');
?>    
