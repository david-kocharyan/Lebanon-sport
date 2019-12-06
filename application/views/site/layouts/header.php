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

<div class="loader" style="position:fixed;
	left:0;
	top:0;
	width:100%;
	height:100%;
	z-index:9999;
	/*background:url(https://whaleshares.io/imageupload_data/9710b7f7cc799dbf70fc01a196cba26691814a5d) 50% 50% no-repeat #fff;*/
	background:url(<?= base_url("/public/site/images/loader.gif") ?>) 50% 50% no-repeat #fff;
	opacity:1;
	"></div>


<div class="wrapper">
	<header>
		<div class="container header-inner">
			<div class="grad"
				 style="visibility: hidden; position: absolute; height: 6px; bottom: 0; z-index: 111;	background: linear-gradient(90deg, rgba(77,169,152,1) 0%, rgba(77,169,152,1) 71%, rgba(40,61,90,0.8827906162464986) 92%);"></div>

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
						<li class="title" data-item="home">
							<a href="<?= base_url("$lang/") ?>" class="scroll"><?= lang('home'); ?></a>
						</li>
						<li class="title sport_news" data-item="news">
							<a href="<?= base_url("$lang/") ?>#news" class="scroll"><?= lang('news'); ?></a>
						</li>
						<li class="title" data-item="games">
							<a href="<?= base_url("$lang/") ?>#games" class="scroll"><?= lang('upcoming'); ?></a>
						</li>
						<li class="title dropdown sport_active" data-item="upcoming">
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
						<li class="title" data-item="contact">
							<a href="<?= base_url("$lang/") ?>#contact" class="scroll"><?= lang('contact'); ?></a>
						</li>

					</ul>
				</div>
			</nav>
			<select name="language" id="lang">
				<option value="en" <?php if ($this->session->userdata("lang") == "en") echo "selected"; ?>>EN
				</option>
				<option value="ar" <?php if ($this->session->userdata("lang") == "ar") echo "selected"; ?>>AR
				</option>
			</select>
		</div>
	</header>


	<script>
        $(window).on("load", function (e) {
            $(".loader").fadeOut("slow");

        })

        $(document).ready(function () {
            $(".title").mouseover(function () {
                var x = $(this).position().left + 150;
                console.log(x)
                $('.grad').css({
                    'margin-left': x,
                    // 'transition': '0.3s',
                    // 'transition-delay' : 'all 3s 1s',
                    'visibility': 'visible',
                });

                if ($(this).data("item") == 'home') {
                    $('.grad').css({'width': '95%'});
                } else if ($(this).data("item") == 'news') {
                    $('.grad').css({'width': '60%'});
                } else if ($(this).data("item") == 'games') {
                    $('.grad').css({'width': '65%'});
                } else if ($(this).data("item") == 'upcoming') {
                    $('.grad').css({'width': '45%'});
                } else if ($(this).data("item") == 'contact') {
                    $('.grad').css({'width': '25%'});
                }
            })


            $(".title").mouseout(function () {
                $('.grad').css({
                    'transition': '0s',
                    'visibility': 'hidden',
                });
            })
        })

        var url = window.location.href;
        url = url.split("/");
        console.log(url);

        url.forEach((name, index) => {
            if (name == "activites" || name == "game" || name == "game-school") {
                $(".sport_active").css({
                    "background": "#4DA998",
                })
                $('.sport_active').toggleClass('changed');
            } else if (name == 'topic') {
                $(".sport_news").css({
                    "background": "#4DA998",
                })
                $('.sport_news').toggleClass('changed');
            }
        });

	</script>
