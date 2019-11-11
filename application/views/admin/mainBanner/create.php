<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Topic</h3>
		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/banner/store') ?>" method="post" enctype="multipart/form-data">
					<div class="form-body">

						<?php if(isset($data->id)) : ?>
							<input type="hidden" value="<?= $data->id ?>" name="id">
						<?php endif; ?>
						<!-- .row -->
						<div class="row">
							<div class="col-sm-6 ol-md-6 col-xs-12">
								<div class="white-box">
									<h3 class="box-title">Choose Banner Image</h3>
									<?php if ($this->session->flashdata('error')) { ?>
										<div class="help-block with-errors text-danger">
											<?= $this->session->flashdata('error'); ?>
										</div>
									<?php } ?>
									<input type="file" id="input-file-now" class="dropify" name="image"/>

								</div>
							</div>
							<?php if(isset($data->banner) && null != $data->banner): ?>
								<div class="col-sm-6 ol-md-6 col-xs-12">
									<div class="white-box">
										<h3>Current Banner</h3>
										<img src="<?= base_url('plugins/images/banner/' . $data->banner); ?>" alt="">
									</div>
								</div>
							<?php endif; ?>
						</div>


						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Text EN</label>
									<?php if (!empty(form_error('text_en'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('text_en'); ?>
										</div>
									<?php } ?>
									<textarea name="text_en" class="form-control"><?= $data->text_en ?? $this->input->post("text_en"); ?></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Text AR</label>
									<?php if (!empty(form_error('text_ar'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('text_ar'); ?>
										</div>
									<?php } ?>
									<textarea name="text_ar" class="form-control"><?= $data->text_ar ?? $this->input->post("text_ar"); ?></textarea>
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
    $( document ).ready(function() {
        let img = `<img src="<?= base_url('plugins/images/banner/'); ?>">`;
        $(document).find(".dropify-render").remove();
    });

</script>
