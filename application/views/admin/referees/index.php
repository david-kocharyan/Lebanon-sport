<?php
$this->lang->load("en", "english");
$this->lang->load("ar", "arabic");
?>

<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Referees Table</h3>
			<p class="text-muted m-b-15">All referees in 1 place!!</p>
			<p class="box-title m-b-30"><a href="<?= base_url("admin/referees/create") ?>" class="text-success">Add new
					Referee</a></p>

			<div class="table-responsive">
				<table id="myTable" class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Name EN</th>
						<th>Name AR</th>
						<th>Mobile Number</th>
						<th>Games count</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($referees as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $value->name_en; ?></td>
							<td><?= $value->name_ar; ?></td>
							<td><?= $value->mobile_number; ?></td>
							<td><?= $value->count; ?></td>
							<td><?= $value->status; ?></td>
							<td>
								<a href="<?= base_url("admin/referees/edit/$value->id") ?>" data-toggle="tooltip"
								   data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info"> <i
										class="fas fa-pencil-alt"></i> </a>

								<?php if ($value->status == 1) { ?>
									<a href="<?= base_url("admin/referees/change-status/$value->id") ?>"
									   data-toggle="tooltip"
									   data-placement="top" title="Deactivate"
									   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
								<?php } else { ?>
									<a href="<?= base_url("admin/referees/change-status/$value->id") ?>"
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
