<div class="generic-form">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-6">
				<div class="container">
					<form action="send-msg" method="post">
						<div class="form-group">
							<?php if (!empty(form_error('first_name'))) { ?>
								<div class="help-block with-errors text-danger">
									<?= form_error('first_name'); ?>
								</div>
							<?php } ?>
							<input type="text" class="form-control" placeholder="First Name" name="first_name"
								   value="<?= $this->input->post('first_name') ?>" required>
						</div>

						<div class="form-group">
							<?php if (!empty(form_error('last_name'))) { ?>
								<div class="help-block with-errors text-danger">
									<?= form_error('last_name'); ?>
								</div>
							<?php } ?>
							<input type="text" class="form-control" placeholder="Last Name" name="last_name"
								   value="<?= $this->input->post('last_name') ?>" required>
						</div>

						<div class="form-group">
							<?php if (!empty(form_error('email'))) { ?>
								<div class="help-block with-errors text-danger">
									<?= form_error('email'); ?>
								</div>
							<?php } ?>
							<input type="email" class="form-control" placeholder="Email" name="email"
								   value="<?= $this->input->post('email') ?>" required>
						</div>

						<div class="form-group">
							<button type="submit" class="form-control btn btn-success">Send</button>
						</div>
				</div>
			</div>
			<div class="col-md-8 col-lg-6">
				<div class="container">
					<?php if (!empty(form_error('msg'))) { ?>
						<div class="help-block with-errors text-danger">
							<?= form_error('msg'); ?>
						</div>
					<?php } ?>
					<textarea name="msg"><?= $this->input->post('msg') ?></textarea>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
