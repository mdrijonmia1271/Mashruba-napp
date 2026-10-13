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
                        <span class="da-panel-title"><i class="icol-pencil"></i>Send SMS</span>
                    </div>
                    <div class="da-panel-content da-form-container">
                        <?php                            
                            //if(validation_errors()){
                                //echo validation_errors('<div class="da-message error">','</div>');
                            //}
                        ?>
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
                        <form enctype="multipart/form-data" class="da-form da-form-inline" method="post" action="<?php echo base_url() . 'noti_sendsms/save'; ?>">
                            <div class="da-form-row">
                                <label class="da-form-label">Customer Category</label>
                                <div class="da-form-item">
                                    <?php
                                    $dropdown_js = 'class="select2-select span12" multiple="multiple"';
                                    echo form_dropdown('category_type[]', $category_type,'',$dropdown_js);
                                    ?>
                                </div>
                            </div>
                            
                            <div class="da-form-row">
                                <label class="da-form-label">Phone:</label>
                                <div class="da-form-item">
                                    <?php
                                    $dropdown_js = 'id="da-ex-picklist"';
                                    echo form_dropdown('phone[]', $customer_array,'',$dropdown_js);
                                    ?>
                                </div>
                            </div>
                           
                            <div class="da-form-row da-form-block">
                                <label class="da-form-label">Text Body</label>
                                <div class="da-form-item">
                                    <textarea placeholder="Enter your text here..." style="width:100%;height:100px;" name="text"></textarea>
                                </div>
                            </div>
                            <div class="btn-row">
                                <input type="submit" value="SEND SMS" class="btn btn-success" onclick="skm_LockScreen('We are processing your request.....it should take some time');">
                            </div>
                            
                        </form>                                       
                        <div id="skm_LockPane" class="LockOff">
                            <img src="<?php echo base_url().'images/loader3.gif'; ?>"  />
                            <br>
                            We are processing your request.....it should take some time
                        </div> 
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
