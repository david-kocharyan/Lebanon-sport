<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Coaches</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/coaches/store') ?>" method="post" enctype="multipart/form-data">
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
								<label class="control-label">School</label>
								<?php if (!empty(form_error('school'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= form_error('school'); ?>
									</div>
								<?php } ?>
								<select name="school" id="school" class="form-control">
									<?php foreach ($schools as $key) { ?>
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

					<div class="form-actions">
						<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
