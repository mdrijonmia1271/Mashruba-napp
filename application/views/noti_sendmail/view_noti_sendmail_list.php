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
                        <span class="da-panel-title"><i class="icon-list"></i>Email Notification Search Wizard</span>
                    </div>
                    <div class="da-panel-content">
                        
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url().'noti_sendmail/records'; ?>">
                            
                            <table class="da-table">

                                <tr>
                                    <th>Email Address</th>
                                    <td>
                                        <input class="span12" id="email" name="email"/>
                                    </td>         
                                    <th>Date From</th>
                                    <td>
                                        <input id="da-from-datepicker" type="text" name="from_date_time" style="width:150px;">
                                    </td>
                                    <th>Date To</th>
                                    <td>
                                        <input id="da-to-datepicker" type="text" name="to_date_time" style="width:150px;">
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
                            <i class="icon-list"></i>Email Notification List
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
                                
                                    <th>Email Address</th>
                                    <th>Subject</th>
                                    <th>Mail Body</th>
                                    <th>Attachment</th>
                                    <th>Send Date Time</th>
                                    <th>Status</th> 
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($rec)) {

                                    foreach ($rec as $key => $value) {
                                        ?>
                                        <tr>
 
                                            <td><?php echo $value->email; ?></td>
                                            <td><?php echo $value->subject; ?></td>
                                            <td><?php echo $value->text; ?></td>
                                            <td>
                                            <?php 
                                            if(!empty($value->file_name)){
                                            ?>    
                                                <a href="<?php echo base_url()."email_files/".$value->file_name; ?>" target="_blank"><?php echo base_url()."email_files/".$value->file_name; ?></a>
                                            <?php
                                            }else{
                                                echo "";
                                            }
                                            
                                            ?></td>
                                            <td><?php echo $value->send_date_time; ?></td>
                                        
                                            <td>
                                                <?php 
                                                if($value->status==1 ){
                                                     echo 'Mail Send';

                                                }else{
                                                    echo 'Failed to send mail';
                                                }
                                                ?>
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
