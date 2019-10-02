<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">

			<?php if (!empty($this->session->flashdata('success'))) { ?>
				<p class="text-mutedv text-success m-b-30">  <?= $this->session->flashdata('success'); ?> </p>
			<?php } ?>

			<form class="form-horizontal form-material" method="post" enctype="multipart/form-data"
				  action="<?= base_url('admin/settings/update/'); ?><?= $admin->id; ?>">

				<div class="form-group">
					<label>Username</label>
					<div>
						<input type="text" value="<?= $admin->username ?>" name="username"
							   class="form-control form-control-line">
					</div>
					<?php if (!empty(form_error('username'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('username'); ?>
						</div>
					<?php } ?>
				</div>

				<div class="form-group">
					<label>Full Name</label>
					<div>
						<input type="text" value="<?= $admin->full_name ?>" name="full_name"
							   class="form-control form-control-line">
					</div>
					<?php if (!empty(form_error('full_name'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('full_name'); ?>
						</div>
					<?php } ?>
				</div>

				<div class="form-group">
					<label>email</label>
					<div>
						<input type="text" value="<?= $admin->email ?>" name="email"
							   class="form-control form-control-line">
					</div>
					<?php if (!empty(form_error('email'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('email'); ?>
						</div>
					<?php } ?>
				</div>

				<div class="form-group">
					<label for="input-file-now">Logo</label>
					<input type="file" id="input-file-now" name="logo" class="dropify" data-max-file-size="15M">
					<img src="<?= base_url('plugins/images/Logo/') ?><?= $admin->logo ?> " class="m-t-15 "
						 alt="logo" width="200" height="200">
					<?php if (!empty(form_error('logo'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('logo'); ?>
						</div>
					<?php } ?>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<button class="btn btn-success">Update Profile</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
