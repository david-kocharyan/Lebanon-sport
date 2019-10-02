<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/') ?>plugins/images/favicon.png">
	<title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url('public/') ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="<?= base_url('public/') ?>css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url('public/') ?>css/style.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="<?= base_url('public/') ?>css/colors/default.css" id="theme" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
	<div class="lg-info-panel">
		<div class="inner-panel">
			<a href="javascript:void(0)" class="p-20 di"><img
					src="<?= base_url('public/') ?>plugins/images/admin-logo.png"></a>
			<div class="lg-content">
				<h2>THE ULTIMATE & MULTIPURPOSE ADMIN TEMPLATE OF 2019</h2>
				<p class="text-muted">with this admin you can get 2000+ pages, 500+ ui component, 2000+ icons, different
					demos and many more... </p>
			</div>
		</div>
	</div>
	<div class="new-login-box">
		<div class="white-box">
			<h3 class="box-title m-b-0">Sign In to Admin</h3>
			<small>Enter your details below</small>

			<form class="form-horizontal new-lg-form" id="loginform" action="<?php echo base_url() ?>admin/Login/login"
				  method="post">

				<div class="form-group  m-t-20">
					<div class="col-xs-12">
						<label>Username</label>
						<?php if (!empty(form_error('username'))) { ?>
							<span style="color: red;">
								<?= form_error('username'); ?>
							</span>
						<?php } ?>
						<input class="form-control" type="text" placeholder="Username" name="username">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label>Password</label>
						<?php if (!empty(form_error('password'))) { ?>
							<span style="color: red;">
								<?= form_error('password'); ?>
							</span>
						<?php } ?>
						<input class="form-control" type="password" placeholder="Password" name="password">
					</div>
				</div>

				<div class="form-group text-center m-t-20">
					<div class="col-xs-12">
						<button
							class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light"
							type="submit">Log In
						</button>
					</div>
				</div>

			</form>
		</div>
	</div>


</section>
<!-- jQuery -->
<script src="<?= base_url('public/') ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('public/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?= base_url('public/') ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="<?= base_url('public/') ?>js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?= base_url('public/') ?>js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= base_url('public/') ?>js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?= base_url('public/') ?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
