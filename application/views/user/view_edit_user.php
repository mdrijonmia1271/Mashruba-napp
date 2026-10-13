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
                        <span class="da-panel-title"><i class="icol-chart-pie"></i>Edit User</span>
                    </div>
                    <div class="da-panel-content">
                        <?php                            
                            if(validation_errors()){
                                echo validation_errors('<div class="da-message error">','</div>');
                            }
                        ?>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url().'user/update'; ?>">
                            
                            <table class="da-table">

                                <tr><th>User Name <span class="required">*</span></th><td><input  class="span12" id="username" name="username" value="<?php  echo isset($res->username) ? $res->username : ''; ?>" /></td></tr>
                                <tr><th>Password <span class="required">*</span></th><td><input  class="span12" id="password" name="password" value="<?php  echo isset($res->password) ? $res->password : ''; ?>" /></td></tr>
                                                  
                                <tr>
                                     <th>Status <span class="required">*</span></th>
                                     <td> 
                                        <?php
                                        
                                        echo form_dropdown('status', $status_array, set_value('status', (isset($res->status)) ? $res->status : ''));
                                        ?>                                                       
                                    </td>
                                </tr>                                                    
                                <tr>
                                    <td colspan="3">
                                        <input type="hidden" name="auto_id" id="auto_id" value="<?php echo isset($res->id) ? $res->id : ''; ?>" />
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