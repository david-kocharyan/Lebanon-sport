<div id="games" style="height: 40px;"></div>
<div class="heading"><h2>Upcoming Games</h2></div>
<div class="container">
	<div class="row">
		<?php foreach ($upcoming as $key => $value) { ?>
			<div class="col-md-8 col-lg-6">
				<div class="game-details">
					<div class="game-details-top">
						<h3 class="team-name">
							<?php if ($lang == 'ar') { ?>
								<?= $value->schools_1_name_ar . " - " . $value->schools_2_name_ar ?>
							<?php } else { ?>
								<?= $value->schools_1_name_en . " - " . $value->schools_2_name_en ?>
							<?php } ?>
						</h3>
						<span class="game-date">
							<?= $value->time; ?>
						</span>
					</div>
					<div class="flex-container game-details-content">
						<p class="">
							<?= $value->teams_1_name . " - " . $value->teams_2_name ?>
						</p>
					</div>
					<div class="game-details-footer">
						<a href="<?= base_url("$lang/") . "upcoming-game/" . $value->id ?>">See Details &gt;</a>
					</div>
				</div>
			</div>
		<?php } ?>
		<ul class="pagination justify-content-center col-md-12">
			<?php for ($i = 1; $i <= $page; $i++) { ?>
				<li class="page-item"><a class="page-link"
										 href="<?= base_url("$lang/all-upcoming-games") . "?page=" . $i; ?>"><?= $i ?></a></li>
			<?php } ?>
		</ul>
	</div>
	<br>
	<br>
</div>
