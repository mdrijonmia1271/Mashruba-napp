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
     <div class="box-inner">
 	<div class="col-md-12">
 		<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
 			<thead>
 				<tr>
 					<th>Id</th>
 					<th>Name</th>
 					<th>Created by</th>
 					<th>Created date time</th>
 					<th>Updated by</th>
 					<th>Updated date time</th>
 					<th>Status</th>
 				</tr>
 			</thead>
 			<?php foreach ($category1 as $v_category) {?>
 			<tbody>
 				<tr>
 					<td><?php echo $v_category['id']?></td>
 					<td><?php echo $v_category['name']?></td>
 					<td><?php echo $v_category['created by']?></td>
 					<td><?php echo $v_category['created date time']?></td>
 					<td><?php echo $v_category['updated by']?></td>
 					<td><?php echo $v_category['updated date time']?></td>
 					<td><?php echo $v_category['status']?></td>
 					<td class="center">
 						<a class="btn btn-success" href="#">
 							<i class="glyphicon glyphicon-zoom-in icon-white btn btn-default btn-lg" id="myBtn"></i>
 							View
 						</a>
 						<a class="btn btn-info" href="#">
 							<i class="glyphicon glyphicon-edit icon-white"></i>
 							Edit
 						</a>
 						<a class="btn btn-danger" href="#">
 							<i class="glyphicon glyphicon-trash icon-white"></i>
 							Delete
 						</a>
 					</td>
 				</tr>
 			</tbody>
 			<?php 	}?>
 			<thead>
 				<tr>
 					<th>Id</th>
 					<th>Name</th>
 					<th>Created by</th>
 					<th>Created date time</th>
 					<th>Updated by</th>
 					<th>Updated date time</th>
 					<th>Status</th>

 				</tr>
 			</thead>
 		</table>
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