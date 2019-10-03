<div class="col-md-4 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Area</h3>

		<?php if (!empty($this->session->flashdata('success'))) { ?>
			<p class="text-muted m-b-30 font-13"> Create new region quickly and easily!</p>
			<p class="text-mutedv text-success m-b-30">  <?= $this->session->flashdata('success'); ?> </p>
		<?php } else { ?>
			<p class="text-muted m-b-30 font-13"> Create new region quickly and easily!</p>
		<?php } ?>

		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<form action="<?= base_url("admin/regions/store") ?>" method="post">

					<div class="form-group">
						<label for="area">Region Name EN</label>
						<?php if (!empty(form_error('name_en'))) { ?>
							<div class="help-block with-errors text-danger">
								<?= form_error('name_en'); ?>
							</div>
						<?php } ?>
						<div class="input-group">
							<input type="text" class="form-control" id="en" placeholder="Region name en"
								   name="name_en" value="<?= $this->input->post('name_en')?>">
							<div class="input-group-addon"><i class="ti-target"></i></div>
						</div>
					</div>

					<div class="form-group">
						<label for="area">Region Name AR</label>
						<?php if (!empty(form_error('name_ar'))) { ?>
							<div class="help-block with-errors text-danger">
								<?= form_error('name_ar'); ?>
							</div>
						<?php } ?>
						<div class="input-group">
							<input type="text" class="form-control" id="ar" placeholder="Region name ar"
								   name="name_ar" value="<?= $this->input->post('name_ar')?>">
							<div class="input-group-addon"><i class="ti-target"></i></div>
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
						<a href="<?= base_url("admin/regions") ?>">
							<button type="button" class="btn btn-inverse waves-effect waves-light">Return</button>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
