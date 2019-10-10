<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Schools Table</h3>
			<p class="text-muted m-b-15">All Schools in 1 place!!</p>
			<p class="box-title m-b-30"><a href="<?= base_url("admin/schools/create") ?>" class="text-success">Add new
					School</a></p>

			<div class="table-responsive">
				<table id="myTable" class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Name en</th>
						<th>Name ar</th>
						<th>Address en</th>
						<th>Address ar</th>
						<th>Region en</th>
						<th>Region ar</th>
						<th>Image</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($schools as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $value->name_en; ?></td>
							<td><?= $value->name_ar; ?></td>
							<td><?= $value->address_ar; ?></td>
							<td><?= $value->address_ar; ?></td>
							<td><?= $value->reg_name_en; ?></td>
							<td><?= $value->reg_name_ar; ?></td>
							<td>
								<img src="<?= base_url('/plugins/images/school/'). $value->image; ?>" alt="school image" width="150" height="150">
							</td>
							<td><?= $value->status; ?></td>
							<td>
								<a href="<?= base_url("admin/schools/edit/$value->id") ?>" data-toggle="tooltip"
								   data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info"> <i
										class="fas fa-pencil-alt"></i> </a>

								<?php if ($value->status == 1) { ?>
									<a href="<?= base_url("admin/schools/change-status/$value->id") ?>"
									   data-toggle="tooltip"
									   data-placement="top" title="Deactivate"
									   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
								<?php } else { ?>
									<a href="<?= base_url("admin/schools/change-status/$value->id") ?>"
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
