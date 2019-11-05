<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Referee</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/referees/store') ?>" method="post" enctype="multipart/form-data">
					<div class="form-body">

						<div class="row">
							<div class="col-md-12">
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
						</div>

						<div class="row">
							<div class="col-md-12">
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
								<label class="control-label">Mobile number</label>
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
				</form>
			</div>
		</div>
	</div>
</div>
