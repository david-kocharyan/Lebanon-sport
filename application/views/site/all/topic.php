<div style="height: 40px;"></div>
<div class="heading"><h2>Blogs</h2></div>
<div class="container main-content">
	<div class="row">
		<?php foreach ($blogs as $key => $value) { ?>
			<div class="col-md-4 col-lg-4 right-baner">
				<a href="<?= base_url("$lang/topic/") . $value->blog_id ?>">
					<img src="<?= base_url('plugins/images/blog/') . $value->image ?>" alt="blog_image">
					<figcaption>
						<p>
							 <?php if ($lang == 'ar') { ?>
								<?= $value->title_ar ?>
							<?php } else { ?>
								<?= $value->title_en ?>
							<?php } ?>
						</p>
					</figcaption>
				</a>
			</div>
		<?php } ?>

		<ul class="pagination justify-content-center col-md-12">
			<?php for ($i = 1; $i <= $page; $i++) { ?>
				<li class="page-item"><a class="page-link" href="<?= base_url("$lang/all-news")."?page=".$i; ?>"><?= $i ?></a></li>
			<?php } ?>
		</ul>
	</div>
	<br>
	<br>
</div>
