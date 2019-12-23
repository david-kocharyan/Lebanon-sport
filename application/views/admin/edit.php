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
					<label>First Name</label>
					<div>
						<input type="text" value="<?= $admin->first_name ?>" name="first_name"
							   class="form-control form-control-line">
					</div>
					<?php if (!empty(form_error('first_name'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('first_name'); ?>
						</div>
					<?php } ?>
				</div>

				<div class="form-group">
					<label>Last Name</label>
					<div>
						<input type="text" value="<?= $admin->last_name ?>" name="last_name"
							   class="form-control form-control-line">
					</div>
					<?php if (!empty(form_error('last_name'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('last_name'); ?>
						</div>
					<?php } ?>
				</div>

				<div class="form-group">
					<label>Email</label>
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
					<label>Mobile number</label>
					<div>
						<input type="text" value="<?= $admin->mobile_number ?>" name="mobile_number"
							   class="form-control form-control-line">
					</div>
					<?php if (!empty(form_error('mobile_number'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('mobile_number'); ?>
						</div>
					<?php } ?>
				</div>


				<div class="form-group">
					<label class="control-label">Password</label>
					<?php if (!empty(form_error('password'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('password'); ?>
						</div>
					<?php } ?>
					<input type="text" id="password" class="form-control" name="password">
					<button type="button" class="generate btn btn-outline btn-primary m-t-5">Generate
						Password
					</button>
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
