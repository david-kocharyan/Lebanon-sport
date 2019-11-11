<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Edit Image</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/blogs/update_image/') . $image->id ?>" method="post"
					  enctype="multipart/form-data">
					<div class="form-body">

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Image</label>
									<?php if (!empty($this->session->flashdata('error'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= $this->session->flashdata('error') ?>
										</div>
									<?php } ?>
									<input type="file" id="input-file-now" class="dropify" name="image" data-height="500" data-default-file="<?= base_url('plugins/images/blog/').$image->image; ?>" />
								</div>
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
