<div class="container main-content-referie">
	<div class="heading"><h2>Referees</h2></div>
	<section class="gerneric-banner">Referees</section>
	<div class="row">
		<div class="col-lg-6">
			<div class="referie-container ">
				<?php foreach ($referees as $key) { ?>
					<div class="referie-details-block">
						<div class="row">
							<div class="col-lg-6">
								<img src="<?= base_url("plugins/images/referee/") . $key->image ?>" alt="" width="150"
									 height="150">
							</div>
							<div class="referie-details col-lg-6 nopadding">
								<p class="ref-name">
									<?php echo $lang == "ar" ? $key->name_ar : $key->name_en; ?>
								</p>
								<p>
									October 30, 1986
								</p>
								<p>
									Mounth Lebanon
								</p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="right-banner container nopadding checkbox-container">
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


<script>
    $(document).ready(function () {
        var params = {};
        function filter() {
            var regions = new Array();
            $('input[name="regions[]"]:checked').each(function () {
                regions.push($(this).val());
            });

            if (regions.length != 0) params.regions = regions;
            var query = $.param(params);
            var n = window.location.href.split("?");
            window.location.replace(n[0] + "?" + query);
        }

        $(document).on("click", ".applyBtn", function () {
            filter();
        });

    });
</script>
