<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KCRA Packing Slips</title>
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo asset_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo asset_url(); ?>css/style.css">
	<link rel="stylesheet" type="text/css" media="print" href="<?php echo asset_url(); ?>css/print.css">
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<span class="navbar-brand">KCRA | <?php echo $title ?></span>
		</div>
		<div class="col-sm-3 col-sm-offset-4">
	            <div id="imaginary_container"> 
	                <div class="input-group stylish-input-group">
	                  
	                </div>
	            </div>
        	</div>		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo site_url('slips/create'); ?>">New Slip</a></li>
			<li><a href="<?php echo site_url('active'); ?>">Active Slips</a></li>
			<li><a href="<?php echo site_url('archive'); ?>">Archive</a></li>
			<li><a href="<?php echo site_url('vendors'); ?>">Vendors</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
	<div class="container">