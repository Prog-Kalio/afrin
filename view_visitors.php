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
							<th>Counter</th>
							<th>IP Address</th>
							<th>Device</th>
							<th>Operating System</th>
							<th>Browser</th>
							<th>Visited At</th>
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
							<td><?php $tm = time(); echo date('m/d/y', $tm); ?></td>
						</tr>

					</tbody>
				</table>
			</div>

		</div>
		
	</div>
</div>


<?php include_once("footer.php") ?>