<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Observer</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/observers/store') ?>" method="post" enctype="multipart/form-data">
					<div class="form-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Name EN</label>
									<?php if (!empty(form_error('name_en'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('name_en'); ?>
										</div>
									<?php } ?>
									<input type="text" id="firstName" class="form-control" name="name_en"
										   value="<?= $this->input->post("name_en"); ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Name AR</label>
									<?php if (!empty(form_error('name_ar'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('name_ar'); ?>
										</div>
									<?php } ?>
									<input type="text" id="lastName" class="form-control" name="name_ar"
										   value="<?= $this->input->post("name_ar"); ?>" style="direction: rtl">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 ">
							<div class="form-group">
								<label class="control-label">Region</label>
								<?php if (!empty(form_error('region'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= form_error('region'); ?>
									</div>
								<?php } ?>
								<select name="region" id="region" class="form-control">
									<?php foreach ($region as $key) { ?>
										<option value="<?= $key->id ?>"><?= $key->name_en ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Sport Types</label>
								<?php if (!empty($this->session->flashdata('error_sport'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= $this->session->flashdata('error_sport') ?>
									</div>
								<?php } ?>
								<select class="select2 m-b-10 select2-multiple" multiple="multiple"
										data-placeholder="Choose" style="width: 100%;" name="sport[]">
									<?php foreach ($sports as $key) { ?>
										<option value="<?= $key->id ?>"><?= $key->name_en ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 ">
							<div class="form-group">
								<label class="control-label">Gender</label>
								<?php if (!empty(form_error('gender'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= form_error('gender'); ?>
									</div>
								<?php } ?>
								<select name="gender" id="gender" class="form-control">
									<option value="1">male</option>
									<option value="0">female</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 ">
							<div class="form-group">
								<label class="control-label">Email</label>
								<?php if (!empty(form_error('email'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= form_error('email'); ?>
									</div>
								<?php } ?>
								<input type="text" id="email" class="form-control" name="email"
									   value="<?= $this->input->post("email"); ?>" style="direction: ltr">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 ">
							<div class="form-group">
								<label class="control-label">Mobile Number</label>
								<?php if (!empty(form_error('mobile_number'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= form_error('mobile_number'); ?>
									</div>
								<?php } ?>
								<input type="text" id="mobile_number" class="form-control" name="mobile_number"
									   value="<?= $this->input->post("mobile_number"); ?>" style="direction: ltr">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 ">
							<div class="form-group">
								<label class="control-label">Username</label>
								<?php if (!empty(form_error('username'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= form_error('username'); ?>
									</div>
								<?php } ?>
								<input type="text" id="username" class="form-control" name="username"
									   value="<?= $this->input->post("username"); ?>" style="direction: ltr">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 ">
							<div class="form-group">
								<label class="control-label">Password</label>
								<?php if (!empty(form_error('password'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= form_error('password'); ?>
									</div>
								<?php } ?>
								<input type="text" id="password" class="form-control" name="password" style="direction: ltr">
								<button type="button" class="generate btn btn-outline btn-primary m-t-5">Generate Password</button>
							</div>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$(".generate").click(function () {
            var length = 10,
                charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            $("#password").val(retVal);
        })
    })
</script>
