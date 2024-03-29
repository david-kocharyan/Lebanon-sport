<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Edit School</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/schools/update/') . $school->id ?>" method="post"
					  enctype="multipart/form-data">
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
										   value="<?= $school->name_en ?>">
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
										   value="<?= $school->name_ar ?>" style="direction: rtl">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Address EN</label>
									<?php if (!empty(form_error('address_en'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('address_en'); ?>
										</div>
									<?php } ?>
									<input type="text" id="firstName" class="form-control" name="address_en"
										   value="<?= $school->address_en ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Address AR</label>
									<?php if (!empty(form_error('address_ar'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('address_ar'); ?>
										</div>
									<?php } ?>
									<input type="text" id="lastName" class="form-control" name="address_ar"
										   value="<?= $school->address_ar ?>" style="direction: rtl">
								</div>
							</div>
						</div>

						<?php if ($user['role'] == 2) { ?>
							<div class="row">
								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Choose admin</label>
										<?php if (!empty(form_error('admin'))) { ?>
											<div class="help-block with-errors text-danger">
												<?= form_error('admin'); ?>
											</div>
										<?php } ?>

										<select name="admin" id="select" class="form-control">
											<?php foreach ($admins as $key) { ?>
												<?php if ($key->role == 1) { ?>
													<option value="<?= $key->id ?>"
														<?php if ($key->id == $school->admin_id) { ?>
															selected
														<?php } ?>
													>
														<?= $key->username ?>
													</option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						<?php } ?>

						<?php if ($user['role'] == 2) { ?>
							<div class="row">
								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Choose region</label>
										<?php if (!empty(form_error('region'))) { ?>
											<div class="help-block with-errors text-danger">
												<?= form_error('region'); ?>
											</div>
										<?php } ?>

										<select name="region" id="select" class="form-control">
											<?php foreach ($regions as $key) { ?>
												<option value="<?= $key->id ?>">
													<?= $key->name_en ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						<?php } ?>

						<?php if ($user['role'] == 1) { ?>
							<div class="row">
								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Choose region</label>
										<?php if (!empty(form_error('region'))) { ?>
											<div class="help-block with-errors text-danger">
												<?= form_error('region'); ?>
											</div>
										<?php } ?>

										<select name="region" id="select" class="form-control">
											<?php foreach ($admins_region as $key) { ?>
												<option value="<?= $key->id ?>">
													<?= $key->name_en ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						<?php } ?>

						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label class="control-label">Image</label>
									<?php if (!empty($this->session->flashdata('error'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= $this->session->flashdata('error') ?>
										</div>
									<?php } ?>
									<input type="file" class="form-control" name="image">
								</div>
							</div>
						</div>

						<div class="form-actions">
							<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Save</button>
						</div>

					</div>
				</form>

			</div>
		</div>
	</div>
</div>
