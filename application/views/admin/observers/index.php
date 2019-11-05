<?php
$this->lang->load("en", "english");
$this->lang->load("ar", "arabic");
?>

<!--page content-->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Observer Table</h3>
			<p class="text-muted m-b-15">All Observer in 1 place!!</p>
			<p class="box-title m-b-30"><a href="<?= base_url("admin/observers/create") ?>" class="text-success">Add new
					Observer</a></p>

			<div class="table-responsive">
				<table id="myTable" class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Observer Name en</th>
						<th>Observer Name ar</th>
						<th>Image</th>
						<th>Gender En</th>
						<th>Gender AR</th>
						<th>Email</th>
						<th>Mobile Number</th>
						<th>Region</th>
						<th>Sports Types</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($observers as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $value->username; ?></td>
							<td><?= $value->name_en; ?></td>
							<td><?= $value->name_ar; ?></td>
							<td>
								<img src="<?= base_url('plugins/images/users/'). $value->image; ?>" alt="referee" class="img-responsive" width="300">
							</td>
							<td>
								<?php echo $value->gender == 1 ? lang('en_male') : lang('en_female'); ?>
							</td>
							<td>
								<?php echo $value->gender == 1 ? lang('ar_male') : lang('ar_female'); ?>
							</td>
							<td><?= $value->email; ?></td>
							<td><?= $value->mobile_number; ?></td>
							<td><?= $value->region_name_en; ?></td>
							<td>
								<?php foreach ($sport as $key => $v) { ?>
									<?php if ($value->id == $v->user_id) { ?>
										<strong><?= $v->name ?></strong><br/>
									<?php } ?>
								<?php } ?>
							</td>
							<td><?= $value->status; ?></td>
							<td>
								<a href="<?= base_url("admin/observers/edit/$value->id") ?>" data-toggle="tooltip"
								   data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info"> <i
										class="fas fa-pencil-alt"></i> </a>

								<?php if ($value->status == 1) { ?>
									<a href="<?= base_url("admin/observers/change-status/$value->id") ?>"
									   data-toggle="tooltip"
									   data-placement="top" title="Deactivate"
									   class="btn btn-danger btn-circle tooltip-danger"><i class="fa fa-power-off"></i></a>
								<?php } else { ?>
									<a href="<?= base_url("admin/observers/change-status/$value->id") ?>"
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
