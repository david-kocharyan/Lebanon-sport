<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/')?>css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/')?>css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/')?>css/style.css"/>
	<script src="<?= base_url('public/site/')?>js/jquery.min.js"></script>
	<script src="<?= base_url('public/site/')?>js/bootstrap.js"></script>
</head>
<body>
<div class="wrapper">
	<header>
		<div class="container header-inner">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="<?= base_url('/')?>"><img class="hidden-xs" src="<?= base_url('public/site/')?>images/logo.png" alt="activity-baner"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item title">
							<a href="<?= base_url('/')?>">Home</a>
						</li>
						<li class="title">
							<a href="<?= base_url('/news')?>">News</a>
						</li>
						<li class="title">
							<a href="<?= base_url('/upcoming')?>">Upcoming Games</a>
						</li>
						<li class="title">
							<a href="<?= base_url('/activites')?>">Sports Activities</a>
						</li>
						<li class="title">
							<a href="<?= base_url('/contact-us')?>">Contact Us</a>
						</li>
					</ul>
				</div>
		</div>
	</header>
