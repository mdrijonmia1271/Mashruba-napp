<?php
$this->load->view('header/view_header');


//$department_id = $this->session->userdata('department_id');
//echo $depatment_id;
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

    
    <div id="da-content-area" class="ipd-content-area">

        <form enctype="multipart/form-data" class="da-form da-form-inline" method="post" action="<?php echo base_url() . 'user/save'; ?>">   
                
       
        
        <div class="row-fluid">

                <div class="span12">
                    <div class="da-panel collapsible">
                        <div class="da-panel-header">
                            <span class="da-panel-title">
                                <i class="icon-list"></i> Add User Form
                            </span>
                        </div> 
                        <div class="da-panel-content da-table-container">
                            
                            <table class="da-table checkable" style="border-top: 1px solid #cacaca;">
                                <tbody>
                                    
                                    <tr>
                                        <td>User Name</td>
                                        <td colspan="3">
                                            <input type="text" name="username" value="" style="width:350px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td colspan="3">
                                            <input type="password" name="password" value="" style="width:350px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td colspan="">
                                            <?php 
                                                $dropdown_js = 'id="status" style="width:100px;"';
                                                echo form_dropdown('status', $status_array,'', $dropdown_js);
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>

            </div>
                 
            <div class="row-fluid">
                <div class="span12">
                    <div class="da-panel">                   
                        <div class="da-panel-content">
                            <div class="btn-row" style="border: 1px solid #cacaca;">
                                <input type="submit" value="Save" class="btn btn-success btn-large">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
    <!-- End Content Area -->
</div>
<!-- End Main Content Wrapper -->
<?php
$this->load->view('footer/view_footer');
?>    
