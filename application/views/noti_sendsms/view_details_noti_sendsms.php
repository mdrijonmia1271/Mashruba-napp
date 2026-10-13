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
                
                
            </div>  

        </div>
        <div class="row-fluid">
            
            <div class="span12">
                <div class="da-panel collapsible">

                    <div class="da-panel-header">
                        <span class="da-panel-title">
                            <i class="icon-list"></i>  List
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
                        ?>
                        <table id="files"></table>
                        <table id="da-ex-datatable-numberpaging" class="da-table" id="zip_file_list">
                            <tbody>
                                <?php
                                if (!empty($res)) {
                                    ?>
          
                                    <tr><th style="width:200px">Category </th><td><?php echo $name = get_name_by_auto_id('category',$res->cust_category,'name');?></td></tr>
                                    <tr><th>Name </th><td><?php echo $res->cust_name; ?></td></tr>
                                    <tr><th>Phone </th><td><?php echo $res->cust_phone; ?></td></tr>
                                    <tr><th>Email </th><td><?php echo $res->cust_email; ?></td></tr>
                                    <tr><th>Date of Birth </th><td><?php echo $res->date_of_birth; ?></td></tr>
                                    <tr><th>Working Place </th><td><?php echo $res->working_place; ?></td></tr>
                                    <tr><th>Designation </th><td><?php echo $name = get_designation_by_auto_id('designation',$res->cust_designation,'name');?></td></tr>
                                    <tr><th>Special Achivement </th><td><?php echo $res->special_achivement; ?></td></tr>
                                    <tr><th>Present Address </th><td><?php echo $res->present_address; ?></td></tr>
                                    <tr><th>Permanent Address </th><td><?php echo $res->permanent_address; ?></td></tr>
                                    <tr><th>Status </th><td><?php echo get_status_name_by_type($res->cust_status);?></td></tr>

                <?php
                                        
                                               
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
