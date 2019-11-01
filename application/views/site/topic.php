<section class="main-baner">
	<figure>
		<img class="hidden-xs" src="<?= base_url('plugins/images/blog/') . $image->image; ?>" alt="activity-baner">
	</figure>
</section>

<div class="container main-content">
	<div class="row">
		<div class="col-md-8 col-lg-8">
			<h1 class="left-banner-title">
				<?php if ($lang == 'ar') { ?>
					<?= $topic->title_ar ?>
				<?php } else { ?>
					<?= $topic->title_en ?>
				<?php } ?>
			</h1>
			<p>
				<?php if ($lang == 'ar') { ?>
					<?= $topic->text_ar ?>
				<?php } else { ?>
					<?= $topic->text_en ?>
				<?php } ?>
			</p>

		</div>
		<div class="col-md-4 col-lg-4 right-baner">
			<h2 class="other-txt"><span class="line"></span>Other Blogs</h2>

			<?php foreach ($other as $key => $value) { ?>
				<figure>
					<a href="<?= base_url("$lang/topic/") . $value->blog_id ?>">
						<p><img src="<?= base_url('plugins/images/blog/') . $value->image; ?>" alt=""></p>
						<figcaption>
							<p>
								<?php if ($lang == 'ar') { ?>
									<?= $value->title_ar ?>
								<?php } else { ?>
									<?= $value->title_en ?>
								<?php } ?>
							</p>
						</figcaption>
				</figure>
			<?php } ?>

		</div>
	</div>
</div>
