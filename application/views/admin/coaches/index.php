<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Coaches Table</h3>
			<p class="text-muted m-b-15">All Coaches in 1 place!!</p>
			<p class="box-title m-b-30"><a href="<?= base_url("admin/coaches/create") ?>" class="text-success">Add new
					Coaches</a></p>

			<div class="table-responsive">
				<table id="myTable" class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>School name en</th>
						<th>School name ar</th>
						<th>Coaches name en</th>
						<th>Coaches name ar</th>
						<th>Image</th>
						<th>Gender</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($coaches as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $value->school_name_en; ?></td>
							<td><?= $value->school_name_ar; ?></td>
							<td><?= $value->name_en; ?></td>
							<td><?= $value->name_ar; ?></td>
							<td>
								<img src="<?= base_url('plugins/images/coaches/'). $value->image; ?>" alt="referee" class="img-responsive" width="300">
							</td>
							<td><?= $value->gender; ?></td>
							<td><?= $value->status; ?></td>
							<td>
								<a href="<?= base_url("admin/coaches/edit/$value->id") ?>" data-toggle="tooltip"
								   data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info"> <i
										class="fas fa-pencil-alt"></i> </a>

								<?php if ($value->status == 1) { ?>
									<a href="<?= base_url("admin/coaches/change-status/$value->id") ?>"
									   data-toggle="tooltip"
									   data-placement="top" title="Deactivate"
									   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
								<?php } else { ?>
									<a href="<?= base_url("admin/coaches/change-status/$value->id") ?>"
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
