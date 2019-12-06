<section class="main-baner generic-banner activity-content">
	<figure>
		<img class="hidden-xs" src="<?= base_url('public/site/') ?>images/main-banner3.png" alt="activity-baner">
		<figcaption>
			<p>
				<?php if ($lang == 'ar') { ?>
					<?= $school->name_ar; ?>
				<?php } else { ?>
					<?= $school->name_en; ?>
				<?php } ?>
			</p>
		</figcaption>
	</figure>
</section>

<div class="container main-content">
	<div class="heading"><h2>School Details</h2></div>
	<div class="col-lg-12">
		<div class="container">

			<section class="gerneric-banner">Coaches</section>
			<div class="carousel">
				<div class="slideControls">
					<a class="slidePrev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a class="slideNext">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				<ul class="light-slider">
					<?php foreach ($coaches as $key => $value) { ?>
						<li>
							<div class="slider-inner">
								<img src="<?= base_url('plugins/images/coaches/') . $value->image ?>" alt="First slide"
									 width="200" height="200">
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
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>

			<hr>
			<?php foreach ($all_teams as $key => $value) { ?>
				<section class="gerneric-banner">
					<?= $value->name; ?>
				</section>
				<div class="carousel">
					<div class="slideControls">
						<a class="slidePrev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="slideNext">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					<ul class="light-slider">
						<?php foreach ($students as $k => $v) { ?>
							<?php if ($value->team_id == $v->team_id) { ?>
								<li>
									<div class="slider-inner">
										<img src="<?= base_url() . $v->image ?>"
											 alt="First slide"
											 width="200" height="200">
									</div>
									<div class="slider-inner-box">
										<p>
											<?php if ($lang == 'ar') { ?>
												<?= $v->name_ar; ?>
											<?php } else { ?>
												<?= $v->name_en; ?>
											<?php } ?>
										</p>
										<p>
											<?php if ($v->gender == 1) { ?>
												<?= lang('male'); ?>
											<?php } else { ?>
												<?= lang('female'); ?>
											<?php } ?>
										</p>
									</div>
								</li>
							<?php } ?>
						<?php } ?>
					</ul>
				</div>
				<hr>
			<?php } ?>
		</div>
	</div>
</div>


<script src="<?= base_url('public/site/') ?>js/lightslider.js"></script>
<script>
    $(document).ready(function () {
        var slider = $(".light-slider").lightSlider({
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


    });
</script>

