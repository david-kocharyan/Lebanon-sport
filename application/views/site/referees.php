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
								<img src="<?= base_url("public/site/") ?>images/referie.png" alt="">
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
				<p>Game Type</p>
				<form action="/action_page.php" class="row">
					<div class="custom-control custom-checkbox col-md-8 col-lg-5">
						<input type="checkbox" class="custom-control-input" id="defaultUnchecked1">
						<label class="custom-control-label" for="defaultUnchecked1">Beirut</label>
					</div>
					<div class="custom-control custom-checkbox col-md-8 col-lg-5">
						<input type="checkbox" class="custom-control-input" id="defaultUnchecked2">
						<label class="custom-control-label" for="defaultUnchecked2">Beqaa</label>
					</div>
					<div class="custom-control custom-checkbox col-md-8 col-lg-5">
						<input type="checkbox" class="custom-control-input" id="defaultUnchecked3">
						<label class="custom-control-label" for="defaultUnchecked3">Nabatiyeh</label>
					</div>
					<div class="custom-control custom-checkbox col-md-8 col-lg-5">
						<input type="checkbox" class="custom-control-input" id="defaultUnchecked4">
						<label class="custom-control-label" for="defaultUnchecked4">Akkar</label>
					</div>
					<div class="custom-control custom-checkbox col-md-8 col-lg-5">
						<input type="checkbox" class="custom-control-input" id="defaultUnchecked3">
						<label class="custom-control-label" for="defaultUnchecked3">Mount Lebanon</label>
					</div>
					<div class="custom-control custom-checkbox col-md-8 col-lg-5">
						<input type="checkbox" class="custom-control-input" id="defaultUnchecked4">
						<label class="custom-control-label" for="defaultUnchecked4">Baalback-Hermel</label>
					</div>
					<div class="custom-control custom-checkbox col-md-8 col-lg-5">
						<input type="checkbox" class="custom-control-input" id="defaultUnchecked3">
						<label class="custom-control-label" for="defaultUnchecked3">North Lebanon</label>
					</div>
					<div class="custom-control custom-checkbox col-md-8 col-lg-5">
						<input type="checkbox" class="custom-control-input" id="defaultUnchecked4">
						<label class="custom-control-label" for="defaultUnchecked4">South Lebanon</label>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
