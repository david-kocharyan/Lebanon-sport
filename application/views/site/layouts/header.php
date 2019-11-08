<?php $lang = $this->session->userdata("lang"); ?>


<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>

	<link rel="shortcut icon" href="<?= base_url('public/site/') ?>images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?= base_url('public/site/') ?>images/favicon.ico" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/') ?>css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/') ?>css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/') ?>css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/') ?>css/lightslider.css"/>
	<script src="<?= base_url('public/site/') ?>js/jquery.min.js"></script>
	<script src="<?= base_url('public/site/') ?>js/bootstrap.js"></script>
</head>
<body>
<div class="wrapper">
	<header>
		<div class="container header-inner">
			<nav class="navbar navbar-expand-lg">

				<a class="navbar-brand" href="<?= base_url("$lang/") ?>">
					<img class="hidden-xs" src="<?= base_url('public/site/') ?>images/logo.png"
						 alt="activity-baner"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
						aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav nav">
						<li class="title">
							<a href="<?= base_url("$lang/") ?>" class="scroll"><?= lang('home'); ?></a>
						</li>
						<li class="title">
							<a href="<?= base_url("$lang/") ?>#news" class="scroll"><?= lang('news'); ?></a>
						</li>
						<li class="title">
							<a href="<?= base_url("$lang/") ?>#games" class="scroll"><?= lang('upcoming'); ?></a>
						</li>
						<li class="title dropdown">
							<a href="#" class="dropdown-toggle"><?= lang('activites'); ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php foreach ($sport_types as $key => $value) { ?>
									<?php if ($lang == 'ar') { ?>
										<li>
											<a href="<?= base_url("$lang/activites/$value->id") ?>"> <?= $value->name_ar ?> </a>
										</li>
									<?php } else { ?>
										<li>
											<a href="<?= base_url("$lang/activites/$value->id") ?>"> <?= $value->name_en ?> </a>
										</li>
									<?php }
								} ?>
							</ul>
						</li>
						<li class="title">
							<a href="<?= base_url("$lang/") ?>#contact" class="scroll"><?= lang('contact'); ?></a>
						</li>
					</ul>
					<select name="language" id="lang" style="position: absolute; right: -25%;">
						<option value="en" <?php if ($this->session->userdata("lang") == "en") echo "selected"; ?>>EN
						</option>
						<option value="ar" <?php if ($this->session->userdata("lang") == "ar") echo "selected"; ?>>AR
						</option>
					</select>
				</div>
		</div>
	</header>

