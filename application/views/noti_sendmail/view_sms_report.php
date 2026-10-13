<?php
$this->load->view('header/view_header');
?> 
<!-- Main Content Wrapper -->
<div id="da-content-wrap" class="clearfix">
    
    <!-- Content Area -->
    <div id="da-content-area">
        <!-- Start view code-->   
        <div class="row-fluid">
            <div class="span7">
                
                <div class="da-panel">
                    <div class="da-panel-header">
                        <span class="da-panel-title"><i class="icon-list"></i>SMS Year Report Search Wizard</span>
                    </div>
                    <div class="da-panel-content">
                        
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url().'noti_sendsms/sms_report'; ?>">
                            
                            <table class="da-table">

                                <tr>
                                    <th>Select Year</th>
                                    <td>
										<select name="sms_year">
											<?php
												foreach ($years as $year) {
													echo '<option value="'.$year.'">'.$year.'</option>';
												}
											?>
										</select>
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
            
            <div class="span7">
                <div class="da-panel collapsible">

                    <div class="da-panel-header">
                        <span class="da-panel-title">
							 <h4><i class="icon-list"></i> SMS Report - <?php echo $search_year; ?></h4>
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
                                    <th>Month</th>
                                    <th>Number of SMS Sent</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$total = 0;
								foreach($month_sms as $sms){
							?>
								<tr>
									<td>
										<?php
											$dateObj = DateTime::createFromFormat('!m', $sms['month']);
											$monthName = $dateObj->format('F');
											echo $monthName;
										?>
									</td>
									<td><?= $sms['total_sms']; ?></td>
								</tr>
							<?php
									$total = $total + $sms['total_sms'];
								}
							?>
								<tr>
									<td><b>Total</b></td>
									<td><b><?php echo $total; ?></b></td>
								</tr>
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
