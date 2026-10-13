<?php
$this->load->view('header/view_header');
?> 
<!-- Main Content Wrapper -->
<div id="da-content-wrap" class="clearfix">

    <!-- Content Area -->
    <div id="da-content-area">
        <!-- Start view code-->   

        <!-- Start view code-->   
        <div class="row-fluid">
            <div class="span12">
                
                <div class="da-panel">
                    <div class="da-panel-header">
                        <span class="da-panel-title"><i class="icon-list"></i>Category Search Wizard</span>
                    </div>
                    <div class="da-panel-content">
                        
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url().'category/category_list'; ?>">
                            
                            <table class="da-table">

                                <tr>
                                    <th>Category Name</th>
                                    <td>
                                        <input class="span12" id="name" name="name"/>
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
                            <i class="icon-list"></i> Category List
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
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created By</th>
                                    <th>Creation Date</th> 
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

                                            <td>
                                                <?php echo $value->name; ?>
                                            </td>
                                           
                                            <td><?php echo $value->created_by; ?></td>
                                            <td><?php echo $value->created_date_time; ?></td>
                                            <td>
                                                <?php 
                                                echo get_status_name_by_type($value->status);
                                                ?>
                                            </td>
                                            <td>
                                                <p><a class="btn" href="<?php echo base_url().'category/edit/'.$value->id; ?>"><i class="icol-pencil"></i> EDIT</a></p>

                                            </td>

                                            <?php
                                            echo"</tr>";
                                        }
                                        echo '<tr><td colspan="10" class=""><font size="3px">' . $links . '</font></td></tr>';
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
