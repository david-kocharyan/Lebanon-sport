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
					<ul class="navbar-nav">
						<li class="nav-item title">
							<a href="<?= base_url("$lang/") ?>"><?= lang('home'); ?></a>
						</li>
						<li class="title">
							<a href="<?= base_url("$lang/news") ?>"><?= lang('news'); ?></a>
						</li>
						<li class="title">
							<a href="<?= base_url("$lang/upcoming") ?>"><?= lang('upcoming'); ?></a>
						</li>
						<li class="title">
							<a href="<?= base_url("$lang/activites") ?>"><?= lang('activites'); ?></a>
						</li>
						<li class="title">
							<a href="<?= base_url("$lang/contact-us") ?>"><?= lang('contact'); ?></a>
						</li>
					</ul>
					<select name="language" id="lang" style="position: absolute; right: -25%;">
						<option value="en" <?php if ($this->session->userdata("lang") == "en") echo "selected"; ?>>EN</option>
						<option value="ar" <?php if ($this->session->userdata("lang") == "ar") echo "selected"; ?>>AR</option>
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
        })
	</script>
