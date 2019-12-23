<?php
$this->lang->load("en", "english");
$this->lang->load("ar", "arabic");
?>

<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Students Table</h3>
			<p class="box-title m-b-30"><a href="<?= base_url("admin/students/create") ?>" class="text-success">Add new
					Students</a></p>

			<div class="table-responsive">
				<table id="myTable" class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Status</th>
						<th>School Name</th>
						<th>Name EN</th>
						<th>Name AR</th>
						<th>Birthday</th>
						<th>Gender EN</th>
						<th>Gender AR</th>
						<th>Sport Types</th>
						<th>Image</th>
						<th>Options</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($students as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td>
								<img src="<?= base_url('/plugins/images/student/') . $value->image; ?>"
									 alt="school image" width="150" height="150">
							</td>
							<td><?= $value->school_name_en; ?></td>
							<td><?= $value->name_en; ?></td>
							<td><?= $value->name_ar; ?></td>
							<td><?= $value->birthday; ?></td>
							<td>
								<?php echo $value->gender == 1 ? lang('en_male') : lang('en_female'); ?>
							</td>
							<td>
								<?php echo $value->gender == 1 ? lang('ar_male') : lang('ar_female'); ?>
							</td>
							<td>
								<?php foreach ($sports as $key => $val) { ?>
									<?php if ($value->id == $val->student_id) { ?>
										<?= $val->name_en ?> <br/>
									<?php } ?>
								<?php } ?>
							</td>
							<td><?php if($value->status == 1){ echo "Active"; }else{echo "Inactive ";} ?></td>
							<td>
								<a href="<?= base_url("admin/students/edit/$value->id") ?>" data-toggle="tooltip"
								   data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info"> <i
										class="fas fa-pencil-alt"></i> </a>

								<?php if ($value->status == 1) { ?>
									<a href="<?= base_url("admin/students/change-status/$value->id") ?>"
									   data-toggle="tooltip"
									   data-placement="top" title="Deactivate"
									   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
								<?php } else { ?>
									<a href="<?= base_url("admin/students/change-status/$value->id") ?>"
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
</div>
