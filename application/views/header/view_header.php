<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" media="screen">

    <!-- Theme Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dandelion.theme.css" media="screen">
    <!-- Icon Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts/glyphicons/style.css" media="screen">
    <!--  Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dandelion.css" media="screen">
    <!-- Demo Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/demo.css" media="screen">

    <!-- Plugin Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/plugins/wizard/dandelion.wizard.css" media="screen">

    


    <script type="text/javascript">
    var site_url_path = '<?php echo base_url();?>';
    </script>

    <!-- Start Custom JS -->
    <script type="text/javascript">
    <!--
        function siteHost(){ // Read-only-ish
          return "<?php echo base_url();?>";
      }
        //-->
        </script>


        <title>Notification app</title>

        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script type="text/javascript">

        function doSomething(){
         // var id=$(this).val();
		  //alert("hello");
        if($("#medicine_type_hospital").attr("value")=="8"){

            $(".drop").show();
            $(".others").hide();
        }
        else if($("#medicine_type_hospital").attr("value")=="9"){

            $(".drop").show();
            $(".others").hide();
        }
        else{
            $(".drop").hide();
            $(".others").show();
        }      
    }

    function doSomething1(id){
          //var id=$(this).val();
		  //alert("SSSSSSSSSSSSS"+id);
        if($("#mth").attr("value")=="8"){
            $(".box").not(".drop").hide();
            $(".drop").show();
        }
        else if($("#mth").attr("value")=="9"){

            $(".box").not(".drop").hide();
            $(".drop").show();
        }
        else{
            $(".box").not(".others").hide();
            $(".others").show();
        }      
    }

    function myFunction(){

     if($("#admission_type").attr("value")=="4"){
        $(".ref").show();
        $(".notref").hide();
        $(".trans").hide();
    }else if($("#admission_type").attr("value")=="3"){
        $(".ref").hide();
        $(".notref").hide();
        $(".trans").show();
    }else{
        $(".ref").hide();
        $(".notref").show();
        $(".trans").hide();
    }
}	



</script>





<script type="text/javascript">
	// doSomething (){
//		console.log($("#medicine_type_hospital").val());	
	//}



   /* $("#resource_row_1_1").change(function doSomething1(){
		

			
           
         
   }).change(); */









</script>



<script type="text/javascript">
$(document).ready(function doNothing(){
    $("#medicine_type").change(function doNothing(){
        $(this).find("option:selected").each(function doNothing(){


           if($(this).attr("value")=="eyedrops"){
            $(".boxs").not(".drops").hide();
            $(".drops").show();
        }
        else if($(this).attr("value")=="eardrops"){
            $(".boxs").not(".drops").hide();
            $(".drops").show();
        }
        else{
            $(".boxs").not(".otherss").hide();
            $(".otherss").show();
        }

    });
    }).change();
});
</script>

<style type="text/css">
      .LockOff {
         display: none;
         visibility: hidden;
      }
      .LockOn {
         display: block;
         visibility: visible;
         position: absolute;
         z-index: 999;
         top: 0px;
         left: 0px;
         width: 105%;
         height: 105%;
         background-color: #ccc;
         text-align: center;
         padding-top: 20%;
         filter: alpha(opacity=75);
         opacity: 0.55;
      }
</style> 
</head>

<body>

	<!-- Dandelion Customizer (remove if not needed) -->
    <div id="da-customizer">

    </div>

    <!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
    <div id="da-wrapper">

        <!-- Header -->
        <div id="da-header">

            <div id="da-header-top">

                <!-- Container -->
                <div class="da-container clearfix">

                    <!-- Logo Container. All images put here will be vertically centere -->
                    <div id="da-logo-wrap">
                        <div id="da-logo">
                            <div id="da-logo-img">
                                <!-- <a href="<?php echo base_url();?>dc">
                                <img src="<?php echo base_url();?>assets/images/logo.png" alt="Global Network Inc.">
                            </a> -->
                            <span style="color:white;font-size:18px;font-weight: bold;">MASHRUBA Medical Technologies</span>
                        </div>
                    </div>
                </div>

                <!-- Header Toolbar Menu -->
                <div id="da-header-toolbar" class="clearfix">
                    <div id="da-user-profile-wrap">
                        <div id="da-user-profile" data-toggle="dropdown" class="clearfix">
<!--                                <div id="da-user-avatar">
                                    <img src="<?php //echo base_url();?>assets/images/pp.jpg" alt="">
                                </div>-->
                                <div id="da-user-info">
                                    <?php echo $this->session->userdata('admin_login_email');?>
                                    <span class="da-user-title">Administrator</span>
                                </div>
                            </div>
                            
                        </div>
                        <div id="da-header-button-container">
                            <ul>                                
                                <li class="da-header-button-wrap">
                                    <div class="da-header-button">
                                        <a href="<?php echo base_url().'logout'; ?>"><i class="icon-power"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            
            <div id="da-header-bottom">
                <!-- Container -->
                <div class="da-container clearfix">

                    <div id="da-search">
                        <form id="search_user" name="search_user" method="post" action="<?php echo base_url(); ?>">
                            <input type="text" name="search_string" id="search_string" class="search-query" placeholder="Search ...">
                        </form>
                    </div>

                    <!-- Breadcrumbs -->
                    <div id="da-breadcrumb">
                        <ul>
                            <li class="active"><a href=""><i class="icon-home"></i>
                                <?php 
                                if(isset($module_name)){
                                    echo $module_name;
                                }
                                ?>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Content -->
    <div id="da-content">

        <!-- Container -->
        <div class="da-container clearfix">

         <!-- Sidebar Separator do not remove -->
         <div id="da-sidebar-separator"></div>

         <!-- Sidebar -->
         <div id="da-sidebar">

            <!-- Navigation Toggle for < 480px -->
            <div id="da-sidebar-toggle"></div>

            <!-- Main Navigation -->
            <div id="da-main-nav" class="btn-container">
                <ul>
                    <li class="<?php if($this->uri->segment(1) == 'customer') echo 'active';?>">
                        <a href="#">
                                <span class="da-nav-icon">
                                        <i class="icon-notes"></i>
                                </span>
                                Send Mail
                        </a>
                        <ul class="open">
                                <li><a href="<?php echo base_url('noti_sendmail/')?>">Send Mail</a></li>
                                <li><a href="<?php echo base_url('noti_sendmail/records')?>">Reports</a></li>
                        </ul>
                    </li>
                    <li class="<?php if($this->uri->segment(1) == 'customer') echo 'active';?>">
                        <a href="#">
                                <span class="da-nav-icon">
                                        <i class="icon-notes"></i>
                                </span>
                                Send SMS
                        </a>
                        <ul class="open">
                                <li><a href="<?php echo base_url('noti_sendsms/')?>">Send SMS</a></li>
                                <li><a href="<?php echo base_url('noti_sendsms/records')?>">Reports</a></li>
                        </ul>
                    </li>
                    <li class="<?php if($this->uri->segment(1) == 'customer') echo 'active';?>">
                        <a href="#">
                                <span class="da-nav-icon">
                                        <i class="icon-notes"></i>
                                </span>
                                Customer
                        </a>
                        <ul class="open">
                                <li><a href="<?php echo base_url('customer/add_customer')?>">Add Customer</a></li>
                                <li><a href="<?php echo base_url('customer/records')?>">Customer List</a></li>
                        </ul>
                    </li>
                    <li class="<?php if($this->uri->segment(1) == 'category') echo 'active';?>">
                        <a href="#">
                            <span class="da-nav-icon">
                                <i class="icon-settings"></i>
                            </span>
                            Setting
                        </a>
                        <ul class="open">
                            <li><a href="<?php echo base_url('category')?>/add_category">Add Category</a></li>
                            <li><a href="<?php echo base_url('category')?>/category_list">Category List</a></li>
                            <li><a href="<?php echo base_url('designation')?>/add_designation">Add Designation</a></li>
                            <li><a href="<?php echo base_url('designation')?>/designation_list">Designation List</a></li>
                            <li><a href="<?php echo base_url('user')?>/add_user">Add User</a></li>
                            <li><a href="<?php echo base_url('user')?>/user_list">User List</a></li>
                        </ul>
                    </li>

                <li class="<?php if($this->uri->segment(1) == 'noti_sendmail') echo 'active';?>">
                    <a href="#">
                        <!-- Icon Container -->
                        <span class="da-nav-icon">
                            <i class="icon-file"></i>
                        </span>
                        Report
                    </a>
                    <ul class="closed">
                        <li><a href="<?php echo base_url('noti_sendmail/email_report')?>">Email Report</a></li>
                        <li><a href="<?php echo base_url('noti_sendsms/sms_report')?>">SMS Report</a></li>
                    </ul>
                </li>	
                
                <li>
                    <a href="<?php echo base_url();?>logout/">
                        <!-- Icon Container -->
                        <span class="da-nav-icon">
                           <i class="icon-power"></i>
                       </span>
                       Logout
                   </a>
               </li>

        </ul>
    </div>
    <!-- End Main Navigation -->
</div>
<!-- End Sidebar -->
