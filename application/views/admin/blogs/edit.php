<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Edit Topic</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/blogs/update/') . $blog->id ?>" method="post"
					  enctype="multipart/form-data">
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
										   value="<?= $blog->title_en; ?>">
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
										   value="<?= $blog->title_ar; ?>">
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
											  style="resize: none; direction: ltr"><?= $blog->text_en; ?></textarea>
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
											  style="resize: none; direction: rtl"><?= $blog->text_ar; ?></textarea>
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

					<div class="form-actions">
						<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12">
	<div class="white-box">

		<div class="table-responsive">
			<table id="myTable" class="table table-striped">
				<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Status</th>
					<th>Options</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($images as $key => $value) { ?>
					<tr>
						<td><?= $key + 1 ?></td>
						<td>
							<img src="<?= base_url('/plugins/images/blog/').$value->image ?>" alt="image" width="200" height="200" class="img-responsive">
						</td>
						<td><?= $value->status; ?></td>
						<td>
							<?php if ($value->status == 1) { ?>
								<a href="<?= base_url("admin/blog/change-image-status/$value->id") ?>"
								   data-toggle="tooltip"
								   data-placement="top" title="Deactivate"
								   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
							<?php } else { ?>
								<a href="<?= base_url("admin/blog/change-image-status/$value->id") ?>"
								   data-toggle="tooltip"
								   data-placement="top" title="Activate"
								   class="btn btn-success btn-circle tooltip-success"><i
										class="fa fa-power-off"></i></a>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

