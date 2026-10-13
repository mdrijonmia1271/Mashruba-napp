<?php
$this->load->view('header/view_header');
?> 

<!-- Main Content Wrapper -->
<div id="da-content-wrap" class="clearfix">

    <!-- Content Area -->
    <div id="da-content-area">

        <div class="row-fluid">
            <div class="span6">
                
                <div class="da-panel">
                    <div class="da-panel-header">
                        <span class="da-panel-title"><i class="icol-pencil"></i>Generate Internet customer Invoice Pdf</span>
                    </div>
                    <div class="da-panel-content da-form-container">
                        <?php                            
                            if(validation_errors()){
                                echo validation_errors('<div class="da-message error">','</div>');
                            }
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
                        <form enctype="multipart/form-data" class="da-form da-form-inline" method="post" action="<?php echo base_url() . 'pdf/process_pdf'; ?>">
                           <div class="da-form-row">
                                <label class="da-form-label">Year</label>
                                <div class="da-form-item">
                                    <?php                                   
                                    echo form_dropdown('year', $year_array,$current_year, 'class="span12"');
                                    ?> 
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">Month</label>
                                <div class="da-form-item">
                                    <?php                                   
                                    echo form_dropdown('month', $month_array, '', 'class="span12"');
                                    ?> 
                                </div>
                            </div> 
                           
                            <div class="btn-row">
                                <input type="hidden" name="customer_type" value="internet">
                                <input type="submit" value="GENERATE PDF" class="btn btn-success">
                            </div>
                            
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