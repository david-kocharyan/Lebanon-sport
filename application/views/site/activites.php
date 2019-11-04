<section class="main-baner generic-banner">
	<figure>
		<img class="hidden-xs" src="<?= base_url('public/site/') ?>images/main-banner1.jpg" alt="activity-baner">
		<figcaption>
			<p>
				U Sports (stylized as U SPORTS) is the national sport governing body of university sport in Canada,
				comprising the majority of degree-
				granting universities in the country. Its equivalent body for organized sports at colleges in Canada is
				the Canadian Collegiate Athletic Association (CCAA). Some institutions are members of both bodies for
				different sports
			</p>
		</figcaption>
	</figure>
</section>
<div class="container main-content">
	<div class="heading"><h2>Game Fixtures</h2></div>

	<div class="row">
		<div class="col-md-8 col-lg-7">
			<?php foreach ($game as $key => $value) { ?>
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
						<a href="<?= base_url("$lang/") . "game/" . $value->id ?>">See Details &gt;</a>
					</div>
				</div>
			<?php } ?>
		</div>

		<!--search part-->
		<div class="col-md-8 col-lg-4 right-banner">
			<div class="app mb50">
				<div class="app__main">
					<div class="calendar">
						<div id="calendar"></div>
					</div>
				</div>
			</div>

			<div class="container nopadding mb50">
				<p>Gender</p>
				<!-- Default checked -->
				<form class="row">
					<div class="col-md-8 col-lg-4 custom-control custom-radio">
						<input type="radio" class="custom-control-input" id="defaultChecked"
							   name="gender" value="1">
						<label class="custom-control-label" for="defaultChecked">Male</label>
					</div><!-- Default unchecked -->
					<div class="col-md-8 col-lg-4 custom-control custom-radio">
						<input type="radio" class="custom-control-input" id="defaultUnchecked1"
							   name="gender" value="0">
						<label class="custom-control-label" for="defaultUnchecked1">Female</label>
					</div>
					<div class="col-md-8 col-lg-4 custom-control custom-radio">
						<input type="radio" class="custom-control-input" id="defaultUnchecked2"
							   name="gender" value="2" checked>
						<label class="custom-control-label" for="defaultUnchecked2">Both</label>
					</div>
				</form>
			</div>
			<div class="container nopadding checkbox-container mb50">
				<p>Game Type</p>
				<form class="row">
					<?php foreach ($type as $key) { ?>
						<div class="custom-control custom-checkbox col-md-8 col-lg-5">
							<input type="checkbox" name="type[]" class="custom-control-input type"
								   value="<?= $key->id; ?>"
								   id="type<?= $key->id; ?>">
							<label class="custom-control-label" for="type<?= $key->id; ?>">
								<?= $key->type; ?>
							</label>
						</div>
					<?php } ?>
				</form>
			</div>
			<div class="container nopadding checkbox-container mb50">
				<p>Age Group</p>
				<form class="row">
					<?php foreach ($age as $key) { ?>
						<div class="custom-control custom-checkbox col-md-8 col-lg-4">
							<input type="checkbox" name="age[]" class="custom-control-input" value="<?= $key->id; ?>"
								   id="check<?= $key->id; ?>">
							<label class="custom-control-label" for="check<?= $key->id; ?>">
								<?= $key->from . " - " . $key->to; ?>
							</label>
						</div>

					<?php } ?>

				</form>
			</div>
			<div class="container nopadding checkbox-container mb50">
				<p>Regions</p>
				<form class="row">
					<?php foreach ($regions as $key) { ?>

						<div class="custom-control custom-checkbox col-md-8 col-lg-5">
							<input type="checkbox" name="regions[]" class="custom-control-input"
								   value="<?= $key->id; ?>"
								   id="regions<?= $key->id; ?>">
							<label class="custom-control-label" for="regions<?= $key->id; ?>">
								<?php if ($lang == 'ar') { ?>
									<?= $key->name_ar ?>
								<?php } else { ?>
									<?= $key->name_en ?>
								<?php } ?>
							</label>
						</div>
					<?php } ?>
				</form>
			</div>
			<button class="form-control btn btn-success applyBtn">Apply</button>
		</div>
	</div>
</div>

<script src="<?= base_url('public/site/') ?>js/datapicker.js"></script>

<script>

    $(document).ready(function () {

        var params = {};

        $("#calendar").datepicker({
            todayHighlight: true,
            weekStart: 1
        }).on({
            'changeDate': function (e) {
                if (typeof (e.date) == "undefined") return false;
                var date = new Date(e.date),
                    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                    day = ("0" + date.getDate()).slice(-2);
                var time = [date.getFullYear(), mnth, day].join("-");
                var milliseconds = Date.parse(time) / 1000;
                params.date = milliseconds;
            }
        });

        function filter() {
            var type = new Array();
            var age = new Array();
            var regions = new Array();

            $('input[name="type[]"]:checked').each(function () {
                type.push($(this).val());
            });
            $('input[name="age[]"]:checked').each(function () {
                age.push($(this).val());
            });
            $('input[name="regions[]"]:checked').each(function () {
                regions.push($(this).val());
            });

            var gender = $('input[name="gender"]:checked').val();

            if (type.length != 0) params.type = type;
            if (age.length != 0) params.age = age;
            if (regions.length != 0) params.regions = regions;
            if (gender != undefined) params.gender = gender;
            var query = $.param(params);
            var n = window.location.href.split("?");

            window.location.replace(n[0] + "?" + query);
        }

        $(document).on("click", ".applyBtn", function () {
            filter();
        });

    });

</script>
