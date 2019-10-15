<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Edit School</h3>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">

				<form action="<?= base_url('admin/teams/update/') . $team->id ?>" method="post"
					  enctype="multipart/form-data">
					<div class="form-body">

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Name EN</label>
									<?php if (!empty(form_error('name'))) { ?>
										<div class="help-block with-errors text-danger">
											<?= form_error('name'); ?>
										</div>
									<?php } ?>
									<input type="text" id="firstName" class="form-control" name="name"
										   value="<?= $team->name ?>">
								</div>
							</div>
						</div>
						<!---->
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

									<select multiple id="public-methods" class="students"
											name="students[]">
										<?php foreach ($team_students as $key => $val) { ?>
											<option value="<?= $val->student_id ?>"
												<?php if ($val->student_status == 1) echo 'selected' ?>><?= $val->name_en . " / " . $val->name_ar ?></option>
										<?php } ?>
									</select>
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
