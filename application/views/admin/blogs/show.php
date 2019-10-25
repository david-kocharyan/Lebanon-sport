<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<div class="row">
				<h1><?= $blog->title_en ?></h1>
				<p><?= $blog->text_en ?></p>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<div class="row">
				<h1><?= $blog->title_ar ?></h1>
				<p><?= $blog->text_ar ?></p>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default" >
			<div class="panel-heading">Carousel</div>
			<div class="panel-wrapper p-b-10 collapse in">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php foreach ($images as $key => $value) { ?>
						<img src="<?= base_url('plugins/images/blog/') . $value->image ?>" >
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
