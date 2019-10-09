<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Edit Admins</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/moderators/update/') . $admin->id ?>" method="post"
					  enctype="multipart/form-data">
					<div class="form-body">

						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label class="control-label">First name</label>
									<?php if (!empty(form_error('first_name'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('first_name'); ?>
										</div>
									<?php } ?>
									<input type="text" id="first_name" class="form-control" name="first_name"
										   value="<?= $admin->first_name ?>" style="direction: ltr">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label class="control-label">Last Name</label>
									<?php if (!empty(form_error('last_name'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('last_name'); ?>
										</div>
									<?php } ?>
									<input type="text" id="last_name" class="form-control" name="last_name"
										   value="<?= $admin->last_name ?>" style="direction: ltr">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Regions</label>
									<?php if (!empty($this->session->flashdata('error_region'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= $this->session->flashdata('error_region') ?>
										</div>
									<?php } ?>
									<select class="select2 m-b-10 select2-multiple" multiple="multiple"
											data-placeholder="Choose" style="width: 100%;" name="regions[]">
										<?php foreach ($regions as $key) { ?>
											<option
												value="<?= $key->id ?>"
												<?php foreach ($admins_region as $x) {
													if ($key->id == $x->region_id) { ?>
														selected
													<?php }
												} ?>><?= $key->name_en ?></option>
										<?php } ?>
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
										   value="<?= $admin->email ?>" style="direction: ltr">
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
										   value="<?= $admin->mobile_number ?>" style="direction: ltr">
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
										   value="<?= $admin->username ?>" style="direction: ltr">
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
									<input type="text" id="password" class="form-control" name="password"
										   style="direction: ltr">
									<button type="button" class="generate btn btn-outline btn-primary m-t-5">Generate
										Password
									</button>
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
