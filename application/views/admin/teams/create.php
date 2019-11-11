<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Team</h3>

		<div class="help-block with-errors text-danger err" style="display: none;"></div>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">
				<form action="<?= base_url('admin/teams/store') ?>" method="post" enctype="multipart/form-data" class="forma-s">
					<div class="form-body">
						<section class="findStudent">

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
											<option value="2">both</option>
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
								<button type="button" class="btn btn-primary m-b-30 save"><i class="fa fa-check"></i>Save
								</button>
							</div>
						</section>

						<section class="selectStudent" style="display: none;">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Name EN</label>
										<?php if (!empty(form_error('name_s'))) { ?>
											<div class="help-block with-errors text-danger">
												<?= form_error('name_s'); ?>
											</div>
										<?php } ?>
										<input type="text" id="name" class="form-control" name="name_s"
											   value="<?= $this->input->post("name_s"); ?>">
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

										<select multiple id="public-methods" class="students"
												name="students[]"></select>
									</div>
								</div>
							</div>

							<div class="form-actions">
								<button type="button" class="btn btn-success create"><i class="fa fa-check"></i>Create</button>
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

    $('.save').click(function () {
        var age = $('#age').val();
        var school = $('#school').val();
        var sport = $('#sport').val();
        var gender = $('#gender').val();

        var age_text = $('#age :selected').text();
        var school_text = $('#school :selected').text();
        var sport_text = $('#sport :selected').text();
        var gender_text = $('#gender :selected').text();

        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/teams/get-students',
            dataType: "JSON",
            data: {age, school, sport, gender},
            success: function (res) {
                if (typeof res.success !== 'undefined') {
                    $('.err').empty();
                    $('.err').append(res.success);
                    $('.err').css({'display': 'block'})
                } else {
                    $('.err').empty();
                    $('.students').empty();
                    for (let i = 0; i < res.length; i++) {
                        var $option = $('<option></option>')
                            .attr('value', res[i].id)
                            .text(res[i].name_en + ' / ' + res[i].name_ar)
                        $('#public-methods').append($option);
                    }
                    $('#public-methods').multiSelect('refresh');
                    $('#name').val(`${school_text}-${gender_text}/${age_text}/${sport_text}`);

                    $('.findStudent').slideUp("slow");
                    $('.selectStudent').slideDown("slow");
                }
            },
        });
    });

    $('.create').click(function (e) {
        e.preventDefault();
        $('.err').empty();
		var students = $('#public-methods').val();

        if (students.length == 0){
            $('.err').append('Please choose students');
            $('.err').css({'display': 'block'})
        }
        else{
            $('.forma-s').submit();
        }
	})
</script>
