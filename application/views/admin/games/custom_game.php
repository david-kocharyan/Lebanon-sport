<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Games With Custom Teams</h3>

		<div class="help-block with-errors text-danger err" style="display: none;"></div>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">
				<div class="card-body wizard-content">
					<form action="<?= base_url('admin/games/store_custom/') ?>" method="post"
						  enctype="multipart/form-data" class="forma-s">

						<section class="schools">
							<div class="row">
								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">School 1</label>
										<select name="school_1" id="school_1" class="form-control">
											<?php foreach ($school as $key) { ?>
												<option value="<?= $key->id ?>"><?= $key->name_en ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">School 2</label>
										<select name="school_2" id="school_2" class="form-control">
											<?php foreach ($school as $key) { ?>
												<option value="<?= $key->id ?>"><?= $key->name_en ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Age group</label>
										<select name="age" id="age" class="form-control">
											<?php foreach ($age as $key) { ?>
												<option
													value="<?= $key->id ?>"><?= $key->from . " - " . $key->to ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Gender</label>
										<select name="gender" id="gender" class="form-control">
											<option value="2">Both</option>
											<option value="1">Male</option>
											<option value="0">Female</option>
										</select>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Sport Types</label>
										<select name="sport" id="sport" class="form-control">
											<?php foreach ($sport as $key) { ?>
												<option value="<?= $key->id ?>"><?= $key->name_en ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

							</div>

							<div class="form-actions">
								<button type="button" class="btn btn-primary m-b-30 save">Save</button>
							</div>

						</section>

						<section style="display: none;" class="settings">
							<div class="row">

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Game Types</label>
										<select name="game_type" id="game_type" class="form-control">
											<?php foreach ($game_type as $key) { ?>
												<option value="<?= $key->id ?>"><?= $key->type ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Place</label>
										<input type="text" name="place" class="form-control" id="place" required/>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Date / Time</label>
										<input type="text" name="date" readonly id="date" class="form_datetime form-control">
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Observer</label>
										<select name="observer" id="observer" class="form-control"></select>
									</div>
								</div>

								<h3>Team 1</h3>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Name EN</label>
										<?php if (!empty(form_error('name_s1'))) { ?>
											<div class="help-block with-errors text-danger">
												<?= form_error('name_s'); ?>
											</div>
										<?php } ?>
										<input type="text" id="name" class="form-control" name="name_s_1"
											   value="<?= $this->input->post("name_s1"); ?>">
									</div>
								</div>

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
												name="students_1[]"></select>
									</div>
								</div>

								<h3>Team 2</h3>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Name EN</label>
										<?php if (!empty(form_error('name_s2'))) { ?>
											<div class="help-block with-errors text-danger">
												<?= form_error('name_s'); ?>
											</div>
										<?php } ?>
										<input type="text" id="name_2" class="form-control" name="name_s_2"
											   value="<?= $this->input->post("name_s2"); ?>">
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Select Students</label>
										<div class="button-box m-t-20">
											<a id="select-all_2" class="btn btn-danger btn-outline" href="#">Select
												all</a>
											<a id="deselect-all_2" class="btn btn-info btn-outline" href="#">Deselect
												all</a>
										</div>

										<select multiple id="public-methods_2" class="students"
												name="students_2[]"></select>
									</div>
								</div>

								<div class="form-actions">
									<button type="button" class="btn btn-success create"><i class="fa fa-check"></i>Create
									</button>
								</div>
						</section>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'mm/dd/yyyy hh:ii'});

    $('#public-methods').multiSelect();
    $('#select-all').click(function () {
        $('#public-methods').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function () {
        $('#public-methods').multiSelect('deselect_all');
        return false;
    });

    $('#public-methods_2').multiSelect();
    $('#select-all_2').click(function () {
        $('#public-methods_2').multiSelect('select_all');
        return false;
    });
    $('#deselect-all_2').click(function () {
        $('#public-methods_2').multiSelect('deselect_all');
        return false;
    });

</script>

<script>
    $('.save').click(function () {
        var age = $('#age').val();
        var school_1 = $('#school_1').val();
        var school_2 = $('#school_2').val();
        var sport = $('#sport').val();
        var gender = $('#gender').val();
        var age_text = $('#age :selected').text();

        var school_1_text = $('#school_1 :selected').text();
        var school_2_text = $('#school_2 :selected').text();
        var sport_text = $('#sport :selected').text();
        var gender_text = $('#gender :selected').text();

        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/games/get-teams',
            dataType: "JSON",
            data: {age, school_1, school_2, sport, gender},
            success: function (res) {
                if (typeof res.success !== 'undefined') {
                    $('.err').empty();
                    $('.err').append(res.success);
                    $('.err').css({'display': 'block'})

					$('#name').empty();
                    $('#name_2').empty();
                    $('#date').empty();
                    $('#place').empty();
                    $('#observer').empty();
                    $('#public-methods_2').empty().multiSelect('refresh');
                    $('#public-methods').empty().multiSelect('refresh');
                }

                $('.students').empty();
                $('#observer').empty();

                for (let i = 0; i < res["students_1"].length; i++) {
                    var $option = $('<option></option>')
                        .attr('value', res["students_1"][i].id)
                        .text(res["students_1"][i].name_en + ' / ' + res["students_1"][i].name_ar)
                    $('#public-methods').append($option);
                }
                $('#public-methods').multiSelect('refresh');

                for (let i = 0; i < res["students_2"].length; i++) {
                    var $option = $('<option></option>')
                        .attr('value', res["students_2"][i].id)
                        .text(res["students_2"][i].name_en + ' / ' + res["students_2"][i].name_ar)
                    $('#public-methods_2').append($option);
                }
                $('#public-methods_2').multiSelect('refresh');

                for (let i = 0; i < res['observer'].length; i++) {
                    var $option = $('<option></option>')
                        .attr('value', res['observer'][i].id)
                        .text(res['observer'][i].username);
                    $('#observer').append($option);
                }

                $('#name').val(`${school_1_text}-${gender_text}/${age_text}/${sport_text}`);
                $('#name_2').val(`${school_2_text}-${gender_text}/${age_text}/${sport_text}`);

                $('.settings').css({"display": "block"});
            },
        });
    });

    $('.create').click(function (e) {
        e.preventDefault();
        var team_1 = $('#public-methods').val();
        var team_2 = $('#public-methods_2').val();

        if (team_1.length === 0 || team_2.length === 0) {
            $('.err').empty();
            $('.err').append("Please choose students");
            $('.err').css({'display': 'block'})
        } else {
            $('.forma-s').submit();
        }
    })
</script>
