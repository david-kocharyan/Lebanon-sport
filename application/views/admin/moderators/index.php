<?php
$this->lang->load("en", "english");
$this->lang->load("ar", "arabic");
?>

<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Admins Table</h3>
			<p class="box-title m-b-30"><a href="<?= base_url("admin/moderators/create") ?>" class="text-success">Add new
					Admins</a></p>

			<div class="table-responsive">
				<table id="myTable" class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Mobile Number</th>
						<th>Email</th>
						<th>Region EN</th>
						<th>Region AR</th>
						<th>Active</th>
						<th>Options</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($admins as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $value->username; ?></td>
							<td><?= $value->first_name; ?></td>
							<td><?= $value->last_name; ?></td>
							<td><?= $value->mobile_number; ?></td>
							<td><?= $value->email; ?></td>
							<td>
								<?php foreach ($regions as $key => $val) { ?>
									<?php if ($value->id == $val->admin_id) { ?>
										<?= $val->reg_name_en ?> <br/>
									<?php } ?>
								<?php } ?>
							</td>
							<td>
								<?php foreach ($regions as $key => $val) { ?>
									<?php if ($value->id == $val->admin_id) { ?>
										<?= $val->reg_name_ar ?> <br/>
									<?php } ?>
								<?php } ?>
							</td>
							<td><?php if($value->active == 1){ echo "Active"; }else{echo "Inactive ";} ?></td>
							<td>
								<a href="<?= base_url("admin/moderators/edit/$value->id") ?>" data-toggle="tooltip"
								   data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info"> <i
										class="fas fa-pencil-alt"></i> </a>

								<?php if ($value->active == 1) { ?>
									<a href="<?= base_url("admin/moderators/change-status/$value->id") ?>"
									   data-toggle="tooltip"
									   data-placement="top" title="Deactivate"
									   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
								<?php } else { ?>
									<a href="<?= base_url("admin/moderators/change-status/$value->id") ?>"
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
