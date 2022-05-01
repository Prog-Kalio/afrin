<?php session_start();
include_once("classes.php");
include_once("header.php");

?>


<div class="container">
	<div class="row">

		<div class="col-10">
			
			<div class="mt-3" style="min-height: 85vh;">

				<h5 class="text-center">ALL VISITORS</h5>

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>S/N</th>
							<th>IP Address</th>
							<th>Device</th>
							<th>Operating System</th>
							<th>Browser</th>
							<th>Created At</th>
							<th>Updated At</th>
						</tr>
					</thead>

					<tbody>
							<?php 
								$counter = 0;
							?>
						<tr>
							<td><?php echo ++$counter; ?></td>
							<td><?= UserInfo::get_ip(); ?></td>
							<td><?= UserInfo::get_device(); ?></td>
							<td><?= UserInfo::get_os(); ?></td>
							<td><?= UserInfo::get_browser(); ?></td>
							<td><?php echo date('Y-m-d h:i:s', strtotime($value['created_at'])); ?></td>
							<td><?php echo date('Y-m-d h:i:s', strtotime($value['updated_at'])); ?></td>
							<td>
								<a href="delete.php"><i class="fa fa-trash"></i></a>
							</td>
						</tr>

					</tbody>
				</table>
			</div>

		</div>
		
	</div>
</div>


<?php include_once("footer.php") ?>