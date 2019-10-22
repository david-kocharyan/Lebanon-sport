<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create School</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/schools/store') ?>" method="post" enctype="multipart/form-data">
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
										   value="<?= $this->input->post('address_en'); ?>">
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
										   value="<?= $this->input->post('address_ar'); ?>" style="direction: rtl">
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

										<select name="admin" id="select" class="form-control admins">
											<option>Choose</option>
											<?php foreach ($admins as $key) { ?>
												<?php if ($key->role == 1) { ?>
													<?= $key->id ?>
													<option value="<?= $key->id ?>"><?= $key->username ?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>

							<div class="row reg" style="display: none;">
								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Choose region</label>
										<?php if (!empty(form_error('region'))) { ?>
											<div class="help-block with-errors text-danger">
												<?= form_error('region'); ?>
											</div>
										<?php } ?>
										<select name="region" id="select" class="form-control regions">
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


<script>
    $(document).ready(function () {

        $(".admins").change(function () {
            var admin = $(this).val();

            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>admin/schools/get-region',
                dataType: "JSON",
                data: {admin},
                success: function (res) {
                    $('.regions').empty();
                    for (let i = 0; i < res.length; i++) {
                        var $option = $('<option></option>')
                            .attr('value', res[i].id)
                            .text(res[i].name_en);
                        $('.regions').append($option);
                        $('.reg').css({"display": "block"});
                    }
                }
            })
        })
    })
</script>
