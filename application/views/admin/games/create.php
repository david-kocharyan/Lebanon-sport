<div class="col-md-12 col-sm-12">
	<div class="white-box">
		<h3 class="box-title m-b-0">Create Games</h3>

		<div class="help-block with-errors text-danger err" style="display: none;"></div>

		<div class="panel-wrapper collapse in" aria-expanded="true">
			<div class="panel-body">
				<div class="card-body wizard-content">
					<form action="<?= base_url('admin/games/store/') ?>" method="post"
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
								<button type="button" class="btn btn-primary m-b-30 save"><i class="fa fa-check"></i>Save
								</button>
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
										<input type="text" name="place" class="form-control" required/>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Date / Time</label>
										<input type="text" name="date" readonly class="form_datetime form-control">
									</div>
								</div>


								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Observer</label>
										<select name="observer" id="observer" class="form-control"></select>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="form-group">
										<label class="control-label">Team 1</label>
										<select name="team_1" id="team_1" class="form-control"></select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Team 2</label>
										<select name="team_2" id="team_2" class="form-control"></select>
									</div>
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
</script>

<script>
    $(document).ready(function () {
        $(document).on('change', '#team_1', function () {
            var first = $(this).val()
            $("#team_2 > option").each(function () {
                $(this).attr("disabled", false);
                if (this.value == first) {
                    $(this).attr("disabled", true);
                }
            });
        });

        $(document).on('change', '#team_2', function () {
            var first = $(this).val()
            $("#team_1 > option").each(function () {
                $(this).attr("disabled", false);
                if (this.value == first) {
                    $(this).attr("disabled", true);
                }
            });
        });
    })
</script>

<script>
    $('.save').click(function () {
        var age = $('#age').val();
        var school_1 = $('#school_1').val();
        var school_2 = $('#school_2').val();
        var gender = $("#gender :selected").val();
        var sport = $("#sport :selected").val();

        if (age === "" || school_1 === "" || school_2 === "") {
            $('.err').append('Please provide age and schools');
            $('.err').css({'display': 'block'});
        } else {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>admin/games/get-teams',
                dataType: "JSON",
                data: {age, school_1, school_2, gender, sport},
                success: function (res) {
                    if (typeof res.success !== 'undefined') {
                        $('.err').empty();
                        $('.err').append(res.success);
                        $('.err').css({'display': 'block'})
                    } else {
                        $('#team_1').append("<option>Choose Team 1</option>");
                        for (let i = 0; i < res['team_1'].length; i++) {
                            var $option = $('<option></option>')
                                .attr('value', res['team_1'][i].id)
                                .text(res['team_1'][i].name);
                            $('#team_1').append($option);
                        }
                        $('#team_2').append("<option>Choose Team 2</option>");
                        for (let i = 0; i < res['team_2'].length; i++) {
                            var $option = $('<option></option>')
                                .attr('value', res['team_2'][i].id)
                                .text(res['team_2'][i].name);
                            $('#team_2').append($option);
                        }
                        for (let i = 0; i < res['observer'].length; i++) {
                            var $option = $('<option></option>')
                                .attr('value', res['observer'][i].id)
                                .text(res['observer'][i].username);
                            $('#observer').append($option);
                        }

                        $('.err').empty();
                        $('.schools').slideUp("slow");
                        $('.settings').slideDown("slow");
                    }
                },
            });
        }
    });

    $('.create').click(function (e) {
        e.preventDefault();
        $('.forma-s').submit();
    })
</script>

<!---->
<!--<script src="  base url  plugins/socket/2.3.0/socket_io.js"></script>-->
<!--<script>-->
<!--    var socket = io('http://' + document.domain + ':2022');-->
<!--    socket.on('connect', function () {-->
<!--        console.log('connect success');-->
<!--    });-->
<!---->
<!--    $('.save').click(function () {-->
<!--        var x = $('.x').val();-->
<!--        var y = $('.y').val();-->
<!---->
<!--        var m = {x, y};-->
<!--        socket.emit('msg', m);-->
<!--    });-->
<!---->
<!--    socket.on('typing', function (data) {-->
<!--        console.log(data);-->
<!--    });-->
<!--</script>-->
