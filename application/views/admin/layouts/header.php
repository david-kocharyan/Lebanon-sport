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
	<!-- Datatables CSS -->
	<link href="<?= base_url('public/') ?>plugins/bower_components/datatables/media/css/dataTables.bootstrap.css"
		  rel="stylesheet" type="text/css"/>
	<!-- Menu CSS -->
	<link href="<?= base_url('public/') ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css"
		  rel="stylesheet">
	<!--Select 2-->
	<link href="<?= base_url('public/') ?>plugins/bower_components/select2/dist/css/select2.min.css" rel="stylesheet"/>
	<!--dropify-->
	<link rel="stylesheet" href="<?= base_url('public/') ?>plugins/bower_components/dropify/dist/css/dropify.min.css">
	<!-- animation CSS -->
	<link href="<?= base_url('public/') ?>css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url('public/') ?>css/style.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="<?= base_url('public/') ?>css/colors/default.css" id="theme" rel="stylesheet">
	<!-- Color picker plugins css -->
	<link
		href="<?= base_url('public/') ?>plugins/bower_components/jquery-asColorPicker-master/dist/css/asColorPicker.css"
		rel="stylesheet">
	<!-- Date picker plugins css -->
	<link href="<?= base_url('public/') ?>plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css"
		  rel="stylesheet" type="text/css"/>
	<!-- Daterange picker plugins css -->
	<link href="<?= base_url('public/') ?>plugins/bower_components/timepicker/bootstrap-timepicker.min.css"
		  rel="stylesheet">
	<link href="<?= base_url('public/') ?>plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css"
		  rel="stylesheet">

	<!-- Date time picker plugins css -->
	<link href="<?= base_url('public/') ?>plugins/datetimepicker/css/bootstrap-datetimepicker.min.css"
		  rel="stylesheet" type="text/css"/>

	<!-- carousel -->
	<link href="<?= base_url('public/') ?>plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?= base_url('public/') ?>plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet"
		  type="text/css"/>


	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="<?= base_url('public/') ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Date time picker plugins js -->
	<script src="<?= base_url('public/') ?>plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

	<!--multiselect-->
	<link href="<?= base_url('public/') ?>/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?= base_url('public/') ?>plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
</head>

<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
	<svg class="circular" viewBox="25 25 50 50">
		<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
	</svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
	<!-- ============================================================== -->
	<!-- Topbar header - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<nav class="navbar navbar-default navbar-static-top m-b-0">
		<div class="navbar-header">
			<div class="top-left-part">
				<!-- Logo -->
				<a class="logo" href="<?= base_url('admin/blog') ?>">
						<!--This is dark logo icon--><img src="<?= base_url('public/') ?>plugins/images/logo_imp.png"
														  alt="home" class="dark-logo" width="300"/>
				</a>
			</div>
		</div>
		<!-- /.navbar-header -->
		<!-- /.navbar-top-links -->
		<!-- /.navbar-static-side -->
	</nav>
	<!-- End Top Navigation -->
	<!-- ============================================================== -->

	<!-- Left Sidebar - style you can find in sidebar.scss  -->
	<!-- ============================================================== -->
	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav slimscrollsidebar">
			<ul class="nav" id="side-menu">
				<li class="user-pro">
					<a href="#" class="waves-effect"><i class="mdi mdi-account-circle"></i>
						<span class="hide-menu"><?= $user['first_name'] . " " . $user['last_name'] ?><span
								class="fa arrow"></span></span>
					</a>

					<ul class="nav nav-second-level collapse" aria-expanded="false" style="">
<!--						<li><a href=" = base_url('admin/profile') "><i class="ti-user"></i> <span-->
<!--									class="hide-menu">My Profile</span></a></li>-->
						<li><a href="<?= base_url('admin/settings') ?>"><i class="ti-settings"></i> <span
									class="hide-menu">Account Setting</span></a>
						</li>
						<li><a href="<?= base_url('admin/logout') ?>"><i class="fa fa-power-off"></i> <span
									class="hide-menu">Logout</span></a></li>
					</ul>
				</li>
				<li class="devider"></li>

				<?php if ($user['role'] == 2) { ?>
					<li><a href="<?= base_url('admin/regions') ?>" class="waves-effect"><i
								class="mdi mdi-airplane-landing fa-fw"></i> <span
								class="hide-menu">Regions</span></a></li>

					<li><a href="<?= base_url('admin/moderators') ?>" class="waves-effect"><i
								class="mdi mdi-account-key fa-fw"></i> <span
								class="hide-menu">Admins</span></a></li>

					<li><a href="<?= base_url('admin/sport-types') ?>" class="waves-effect"><i
								class="mdi mdi-football fa-fw"></i> <span
								class="hide-menu">Sport Types</span></a></li>

					<li class="devider"></li>
				<?php } ?>

				<li><a href="<?= base_url('admin/blog') ?>" class="waves-effect"><i
							class="mdi mdi-blogger fa-fw"></i> <span
							class="hide-menu">Blog</span></a></li>
				<li><a href="<?= base_url('admin/banner') ?>" class="waves-effect"><i
							class="mdi mdi-image fa-fw"></i> <span
							class="hide-menu">Main Banner</span></a></li>
				<li class="devider"></li>

				<li><a href="<?= base_url('admin/schools') ?>" class="waves-effect"><i
							class="mdi mdi-chair-school fa-fw"></i> <span
							class="hide-menu">Schools</span></a></li>

				<li><a href="<?= base_url('admin/students') ?>" class="waves-effect"><i
							class="mdi mdi-school fa-fw"></i> <span
							class="hide-menu">Students</span></a></li>

				<li><a href="<?= base_url('admin/referees') ?>" class="waves-effect"><i
							class="mdi mdi-flag-checkered fa-fw"></i> <span
							class="hide-menu">Refeeres</span></a></li>

				<li><a href="<?= base_url('admin/coaches') ?>" class="waves-effect"><i
							class="mdi mdi-account-settings-variant fa-fw"></i> <span
							class="hide-menu">Coaches</span></a></li>

				<li><a href="<?= base_url('admin/observers') ?>" class="waves-effect"><i
							class="mdi mdi-account fa-fw"></i> <span
							class="hide-menu">Observers (App Users)</span></a></li>

				<li><a href="<?= base_url('admin/teams') ?>" class="waves-effect"><i
							class="mdi mdi-account-multiple fa-fw"></i> <span
							class="hide-menu">Teams</span></a></li>

				<li><a href="<?= base_url('admin/games') ?>" class="waves-effect"><i
							class="mdi mdi-gamepad-variant fa-fw"></i> <span
							class="hide-menu">Game</span></a></li>

				<li class="devider"></li>
				<li><a href="<?= base_url('admin/check') ?>" class="waves-effect"><i
							class="mdi mdi-bookmark-check fa-fw"></i> <span
							class="hide-menu">Observed games (wait for confirm)</span></a></li>
			</ul>

			<div class="sidebar-head">
				<h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span>
					<span class="hide-menu">SPORT</span></h3>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Left Sidebar -->

	<!-- Page Content -->
	<!-- ============================================================== -->
	<div id="page-wrapper">
		<div class="container-fluid">


			<!--page title-->
			<div class="row bg-title">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title"><?= $title; ?></h4></div>
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?= base_url('admin') ?>">Dashboard</a></li>
						<li class="active"><?= $title; ?></li>
					</ol>
				</div>
			</div>
