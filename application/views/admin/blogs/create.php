<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Topic</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/blogs/store') ?>" method="post" enctype="multipart/form-data">
					<div class="form-body">

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Title EN</label>
									<?php if (!empty(form_error('title_en'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('title_en'); ?>
										</div>
									<?php } ?>
									<input type="text" id="firstName" class="form-control" name="title_en"
										   value="<?= $this->input->post("title_en"); ?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Title AR</label>
									<?php if (!empty(form_error('title_ar'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('title_ar'); ?>
										</div>
									<?php } ?>
									<input type="text" id="firstName" class="form-control" name="title_ar"
										   style="resize: none; direction: rtl"
										   value="<?= $this->input->post("title_ar"); ?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Description EN</label>
									<?php if (!empty(form_error('text_en'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('text_en'); ?>
										</div>
									<?php } ?>
									<textarea name="text_en" id="" cols="60" rows="10" class="form-control"
											  style="resize: none; direction: ltr"><?= $this->input->post('text_en'); ?></textarea>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Description AR</label>
									<?php if (!empty(form_error('text_ar'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('text_ar'); ?>
										</div>
									<?php } ?>
									<textarea name="text_ar" id="" cols="60" rows="10" class="form-control"
											  style="resize: none; direction: rtl"><?= $this->input->post('text_ar'); ?></textarea>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Images</label>
								<?php if (!empty($this->session->flashdata('error'))) { ?>
									<div class="help-block with-errors text-danger">
										<?= $this->session->flashdata('error'); ?>
									</div>
								<?php } ?>
								<input type="file" name="images[]" class="form-control" multiple>
							</div>
						</div>
					</div>


					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Landscape Image</label><br>
							<strong>Please select a picture with a width more than 1000 and a height of less than
								2000</strong>
							<?php if (!empty($this->session->flashdata('landscape'))) { ?>
								<div class="help-block with-errors text-danger">
									<?= $this->session->flashdata('landscape'); ?>
								</div>
							<?php } ?>
							<input type="file" name="landscape" class="form-control">
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
