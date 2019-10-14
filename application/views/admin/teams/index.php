<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Teams Table</h3>
			<p class="text-muted m-b-15">All Teams in 1 place!!</p>
			<p class="box-title m-b-30"><a href="<?= base_url("admin/teams/create") ?>" class="text-success">Add new
					Teams</a></p>

			<div class="table-responsive">
				<table id="myTable" class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Age Group</th>
						<th>Gender</th>
						<th>Sport Type</th>
						<th>School</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($teams as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $value->name; ?></td>
							<td><?= $value->age_group; ?></td>
							<td>
								<?php if($value->gender == 2){
									echo "Both";
								}
								elseif ($value->gender == 1){
									echo "Male";
								}else{
									echo "Female";
								}?>
							</td>
							<td><?= $value->sport; ?></td>
							<td><?= $value->school; ?></td>
							<td><?= $value->status; ?></td>
							<td>
								<a href="<?= base_url("admin/teams/edit/$value->id") ?>" data-toggle="tooltip"
								   data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info"> <i
										class="fas fa-pencil-alt"></i> </a>

								<?php if ($value->status == 1) { ?>
									<a href="<?= base_url("admin/teams/change-status/$value->id") ?>"
									   data-toggle="tooltip"
									   data-placement="top" title="Deactivate"
									   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
								<?php } else { ?>
									<a href="<?= base_url("admin/teams/change-status/$value->id") ?>"
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
