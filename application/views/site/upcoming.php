<div class="container main-content">
	<div class="heading"><h2>Game Result</h2></div>
	<div class="result-banner">
		<div class="row">
			<div class="col-lg-4"><?= $game->team_1_name; ?></div>
			<div class="col-lg-4 text-center">0 - 0</div>
			<div class="col-lg-4 text-center"><?= $game->team_1_name; ?></div>
		</div>
	</div>
	<div class="heading"><h2>Team Details</h2></div>
	<div class="col-lg-12">
		<div class="container">

			<section class="gerneric-banner"><?= $game->team_1_name; ?></section>
			<div class="carousel">
				<div class="slideControls">
					<a class="slidePrev">
					</a>
					<a class="slideNext">
					</a>
				</div>
				<ul id="light-slider">
					<?php foreach ($team_1 as $key => $value) { ?>
						<li>
							<div class="slider-inner">
								<img src="<?= base_url() . $value->image ?>" alt="First slide" width="200" height="200">
							</div>
							<div class="slider-inner-box">
								<p>
									<?php if ($lang == 'ar') { ?>
										<?= $value->name_ar; ?>
									<?php } else { ?>
										<?= $value->name_en; ?>
									<?php } ?>
								</p>
								<p>
									<?php if ($value->gender == 1) { ?>
										<?= lang('male'); ?>
									<?php } else { ?>
										<?= lang('female'); ?>
									<?php } ?>
								</p>
								<p>
									<?= $value->birthday ?>
								</p>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>

			<section class="gerneric-banner"><?= $game->team_2_name; ?></section>
			<div class="carousel">
				<div class="slideControls2">
					<a data-id="slider2Left" class="slidePrev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a data-id="slider2right" class="slideNext">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				<ul id="light-slider-2">

					<?php foreach ($team_2 as $key=>$value) { ?>
						<li>
							<div class="slider-inner">
								<img src="<?= base_url() . $value->image ?>" alt="First slide" width="200" height="200">
							</div>
							<div class="slider-inner-box">
								<p>
									<?php if ($lang == 'ar') { ?>
										<?= $value->name_ar; ?>
									<?php } else { ?>
										<?= $value->name_en; ?>
									<?php } ?>
								</p>
								<p>
									<?php if ($value->gender == 1) { ?>
										<?= lang('male'); ?>
									<?php } else { ?>
										<?= lang('female'); ?>
									<?php } ?>
								</p>
								<p>
									<?= $value->birthday ?>
								</p>
							</div>
						</li>
					<?php } ?>

				</ul>
			</div>
		</div>
	</div>
</div>


<script src="<?= base_url('public/site/') ?>js/lightslider.js"></script>
<script>
    $(document).ready(function () {
        var slider = $("#light-slider").lightSlider({
            controls: false,
            item: 4,
            auto: true,
            loop: true,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:3,
                        slideMove:1,
                        slideMargin:6,
                    }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:1,
                        slideMove:1
                    }
                }
            ]

        });
        $('.slideControls .slidePrev').click(function () {
            slider.goToPrevSlide();
        });

        $('.slideControls .slideNext').click(function () {
            slider.goToNextSlide();
        });

        // new slide control
        var slider2 = $("#light-slider-2").lightSlider({
            controls: false,
            auto: true,
            item: 4,
            loop: true
        });
        $('.slideControls2 .slidePrev').click(function () {
            slider2.goToPrevSlide();
        });

        $('.slideControls2 .slideNext').click(function () {
            slider2.goToNextSlide();
        });
        // new slide control


    });
</script>
