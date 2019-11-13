<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<div class="row">
				<h1><?= $game->teams_1_name . " <strong>VS</strong> " . $game->teams_2_name ?></h1>

				<a href="<?= base_url("admin/check/save/") . $game->id ?>" class="btn btn-success">Post to site</a>

				<div class="col-lg-12 col-md-12 col-sm-12">
					<h3 class="box-title m-t-40">General Info</h3>
					<div class="table-responsive">
						<table class="table">
							<tbody>

							<tr>
								<td>Place</td>
								<td> <?= $game->place; ?> </td>
							</tr>

							<tr>
								<td>Gender</td>
								<td> <?= $game->gender; ?> </td>
							</tr>

							<tr>
								<td>Date</td>
								<td> <?= gmdate("Y-m-d", $game->time); ?> </td>
							</tr>

							<tr>
								<td>Game Type</td>
								<td> <?= $game->game_type; ?> </td>
							</tr>

							<tr>
								<td>Age group</td>
								<td> <?= $game->age; ?> </td>
							</tr>

							<tr>
								<td>Sport Type</td>
								<td> <?= $game->sport_name; ?> </td>
							</tr>

							<tr>
								<td>Observer Name</td>
								<td> <?= $game->observer_name; ?> </td>
							</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Carousel</div>
			<div class="panel-wrapper p-b-10 collapse in">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php foreach ($image as $key => $value) { ?>
						<?php if (explode("/", mime_content_type(FCPATH . 'plugins/images/end/images/' . $value->image))[0] == "image") { ?>
							<img src="<?= base_url('plugins/images/end/images/') . $value->image ?>">
						<?php } ?>
					<?php } ?>
					<?php foreach ($media as $key) { ?>
						<?php if (explode("/", mime_content_type(FCPATH . 'plugins/images/end/media/' . $key->media))[0] == "image") { ?>
							<img src="<?= base_url('plugins/images/end/media/') . $key->media ?>">
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<div class="row">
				<h2>Video</h2>
				<?php foreach ($media as $key) { ?>
					<?php if (explode("/", mime_content_type(FCPATH . 'plugins/images/end/media/' . $key->media))[0] == "video" OR explode("/", mime_content_type(FCPATH . 'plugins/images/end/media/' . $key->media))[0] == "text") { ?>
						<video width="500" height="500" controls>
							<source src="<?= base_url('plugins/images/end/media/') . $key->media; ?>" type="video/mp4">
							<source src="<?= base_url('plugins/images/end/media/') . $key->media; ?>" type="video/ogg">
							<source src="<?= base_url('plugins/images/end/media/') . $key->media; ?>" type="video/3gpp">
							Your browser does not support the video tag.
						</video>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>

