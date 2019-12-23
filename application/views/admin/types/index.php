<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Sport types Table</h3>
			<p class="box-title m-b-30"><a href="<?= base_url("admin/sport-types/create") ?>" class="text-success">Add new
					Sport type</a></p>

			<div class="table-responsive">
				<table id="myTable" class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Name en</th>
						<th>Name ar</th>
						<th>Description en</th>
						<th>Description ar</th>
						<th>Points</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($types as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td>
								<img src="<?= base_url('/plugins/images/sport/'). $value->image; ?>" alt="school image" width="150" height="150">
							</td>
							<td><?= $value->name_en; ?></td>
							<td><?= $value->name_ar; ?></td>
							<td><?= $value->desc_en; ?></td>
							<td><?= $value->desc_ar; ?></td>
							<td>
								<?php foreach ($points as $key => $val ){
									if ($value->id == $val->sport_type_id){ ?>
										 <?= $val->value . " pt". "<br />"; ?>
									<?php }	}?>
							</td>

							<td><?php if($value->status == 1){ echo "Active"; }else{echo "Inactive ";} ?></td>
							<td>
								<a href="<?= base_url("admin/sport-types/edit/$value->id") ?>" data-toggle="tooltip"
								   data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info"> <i
										class="fas fa-pencil-alt"></i> </a>

								<?php if ($value->status == 1) { ?>
									<a href="<?= base_url("admin/sport-types/change-status/$value->id") ?>"
									   data-toggle="tooltip"
									   data-placement="top" title="Deactivate"
									   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
								<?php } else { ?>
									<a href="<?= base_url("admin/sport-types/change-status/$value->id") ?>"
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
