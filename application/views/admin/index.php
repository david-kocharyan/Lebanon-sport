<!--page content-->
<div class="row">
	<div class="col-sm-6">
		<div class="white-box">


			<p><?= $admin->username ?></p>

			<p><?= $admin->email ?></p>

				<a href="<?= base_url('admin/students/date')?>">
					<button class="btn btn-primary">
						Update students birthday
					</button>
				</a>

		</div>
	</div>
</div>
