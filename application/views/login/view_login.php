<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" media="screen">

<!--  Fluid Grid System -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fluid.css" media="screen">

<!-- Login Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/form.css" media="screen">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css" media="screen">

<link rel="stylesheet" href="<?php echo base_url();?>plugins/zocial/zocial.css" media="screen">

<title>Notification App</title>

</head>

<body>
    
    <div id="da-home-wrap">
        
        <div id="da-home-wrap-inner">
            
            <div id="da-home-inner">
                <!-- <div><img src="<?php echo base_url().'assets/images/logo.png'; ?>"></div> -->
                <div id="da-home-box">
                    
                    <div id="da-home-box-header">
                        <span class="da-home-box-title">Admin login</span>
                    </div>
                    <form class="da-form da-home-form" method="post" action="<?php echo base_url().'login/process'; ?>">
                        <div class="da-form-row">
                            <div class=" da-home-form-big">
                                <input type="text" name="username" id="da-login-username" placeholder="Email Address">
                            </div>
                            <div class=" da-home-form-big">
                                <input type="password" name="password" id="da-login-password" placeholder="Password">
                            </div>
                        </div>
                        <!--<div class="da-form-row">
                            <ul class="da-form-list inline">
                                <li><input type="checkbox" id="remember"> <label for="remember">Remember me</label></li>
                                <li class="pull-right"><a href="#">Forget password</a></li>
                            </ul>
                        </div>-->
                        <div class="da-home-form-btn-big">
                            <input type="submit" value="Login" id="da-login-submit" class="btn btn-danger btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Libs -->
    <script src="<?php echo base_url();?>assets/js/libs/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/jquery.placeholder.min.js"></script>
    <script src="<?php echo base_url();?>plugins/validate/jquery.validate.min.js"></script>

    <!-- JS Login -->
    <script src="<?php echo base_url();?>assets/js/core/dandelion.login.js"></script>
    
</body>
</html>