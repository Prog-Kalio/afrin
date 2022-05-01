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
							<th>Session ID</th>
							<th>IP Address</th>
							<th>Created At</th>
							<th>Updated At</th>
						</tr>
					</thead>

					<tbody>
							<?php 
								if (isset($_SESSION['myvisitors'])) {
							
								$objvisitor = new MyVisitors;
								$output = $objvisitor->getAllVisitors();
								$counter = 0;
								foreach ($output as $key => $value) {

							?>
						<tr>
							<td><?php echo ++$counter; ?></td>
							<td><?php echo $value['session_id']; ?></td>
							<td><?php echo $value['ip_address']; ?></td>
							<td><?php echo date('Y-m-d h:i:s', strtotime($value['created_at'])); ?></td>
							<td><?php echo date('Y-m-d h:i:s', strtotime($value['updated_at'])); ?></td>
							<td>
								<a href="edit.php"><i class="fa fa-edit"></i></a><br>
								<a href="delete.php"><i class="fa fa-trash"></i></a>
							</td>
						</tr>

							<?php 
									} 
								}	
							?>
					</tbody>
				</table>
			</div>

		</div>
		
	</div>
</div>


<?php include_once("footer.php") ?>