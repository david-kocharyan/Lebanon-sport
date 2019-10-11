<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create School</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/teams/store') ?>" method="post" enctype="multipart/form-data">
					<div class="form-body">

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

						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label class="control-label">Sport Types</label>
									<?php if (!empty(form_error('sport'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('sport'); ?>
										</div>
									<?php } ?>
									<select name="sport" id="sport" class="form-control">
										<?php foreach ($sport as $key) { ?>
											<option value="<?= $key->id ?>"><?= $key->name_en ?></option>
										<?php } ?>
									</select>
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
										<?php foreach ($school as $key) { ?>
											<option value="<?= $key->id ?>"><?= $key->name_en ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label class="control-label">Age group</label>
									<?php if (!empty(form_error('age'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('age'); ?>
										</div>
									<?php } ?>
									<select name="age" id="age" class="form-control">
										<?php foreach ($age as $key) { ?>
											<option
												value="<?= $key->id ?>"><?= $key->from . " - " . $key->to ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>

						<div class="form-actions">
							<button type="button" class="btn btn-primary m-b-30 save-filter"><i class="fa fa-check"></i>Save
							</button>
						</div>

						<section class="selectStudent" style="display: block;">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Name EN</label>
										<?php if (!empty(form_error('name'))) { ?>
											<div class="help-block with-errors text-danger">
												<?= form_error('name'); ?>
											</div>
										<?php } ?>
										<input type="text" id="name" class="form-control" name="name"
											   value="<?= $this->input->post("name"); ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Select Students</label>
										<div class="button-box m-t-20">
											<a id="select-all" class="btn btn-danger btn-outline" href="#">Select
												all</a>
											<a id="deselect-all" class="btn btn-info btn-outline" href="#">Deselect
												all</a>
										</div>

										<select multiple id="public-methods" name="students[]">
											<?php foreach ($age as $key) { ?>
												<option
													value="<?= $key->id ?>"><?= $key->from . " - " . $key->to ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Create</button>
							</div>
						</section>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script>
    $('#public-methods').multiSelect();
    $('#select-all').click(function () {
        $('#public-methods').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function () {
        $('#public-methods').multiSelect('deselect_all');
        return false;
    });


</script>
