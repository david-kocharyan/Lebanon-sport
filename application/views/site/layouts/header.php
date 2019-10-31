<?php $lang = $this->session->userdata("lang"); ?>


<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/') ?>css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/') ?>css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/site/') ?>css/style.css"/>
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
							<a href="<?= base_url("$lang/") ?>"><?= lang('home'); ?></a>
						</li>
						<li class="title">
							<a href="#news" ><?= lang('news'); ?></a>
						</li>
						<li class="title">
							<a href="#games"><?= lang('upcoming'); ?></a>
						</li>
						<li class="title dropdown">
							<a href="<?= base_url("$lang/activites") ?>" class="dropdown-toggle" ><?= lang('activites'); ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
<!--								$lang."/activites/". $value->id;-->
								<?php foreach ($sport_types as $key => $value) { ?>
									<?php if ($lang == 'ar') { ?>
										<li><a href="<?= base_url("$lang/activites") ?>"> <?= $value->name_ar ?> </a></li>
									<?php } else { ?>
										<li><a href="<?= base_url("$lang/activites") ?>"> <?= $value->name_en ?> </a></li>
									<?php }
								} ?>
							</ul>
						</li>
						<li class="title">
							<a href="#contact"><?= lang('contact'); ?></a>
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

	<script>
        $(document).ready(function () {
            $("#lang").change(function () {
                var lang = $("#lang :selected").val();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url("change"); ?>',
                    dataType: "JSON",
                    data: {lang},
                    success: function (res) {
                        var url = window.location.href;
                        url = url.split("/");
                        url.forEach((name, index) => {
                            if (name == "en") {
                                url[index] = "ar";
                            } else if (name == "ar") {
                                url[index] = "en";
                            }
                        });
                        url = url.join("/");
                        window.location.replace(url)
                    }
                })
            })

            $('ul.nav li.dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
            });

        })
	</script>
