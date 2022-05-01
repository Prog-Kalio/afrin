<?php session_start();
include_once("classes.php");
include_once("myheader.php");
if (!isset($_SESSION['session_id'])) {
	$_SESSION['session_id'] = time().rand();
}
if (!isset($_SESSION['ip_address'])) {
	$_SESSION['ip_address'] = UserInfo::get_ip();
}
if (!isset($_SESSION['device'])) {
	$_SESSION['device'] = UserInfo::get_device();
}
if (!isset($_SESSION['operating_system'])) {
	$_SESSION['operating_system'] = UserInfo::get_os();
}
if (!isset($_SESSION['browser'])) {
	$_SESSION['browser'] = UserInfo::get_browser();
}
if(!isset($_SESSION['url'])) {
  $_SESSION['url'] = $_SERVER['REQUEST_URI'];
}

$object = new MyVisitors;
$_SESSION['session_id'] = time().rand();
$_SESSION['ip_address'] = UserInfo::get_ip();
$_SESSION['device'] = UserInfo::get_device();
$_SESSION['operating_system'] = UserInfo::get_os();
$_SESSION['browser'] = UserInfo::get_browser();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$output = $object->addToAfrin($_SESSION['session_id'], $_SESSION['ip_address'], $_SESSION['device'], $_SESSION['operating_system'], $_SESSION['browser'], $_SESSION['url']);
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
							<th>Session ID</th>
							<th>IP Address</th>
							<th>Device</th>
							<th>Operating System</th>
							<th>Browser</th>
							<th>Page Visited</th>
							<th>Visited At</th>
						</tr>
					</thead>

					<tbody>
					<?php 

						$object = new MyVisitors;
						$output = $object->getAllVisitors();
						 $counter = 0;
						foreach ($output as $key => $value) {

					?>
				<tr>
					<td><?php echo ++$counter; ?></td>
					<td><?php echo $value['session_id']; ?></td>
					<td><?php echo $value['ip_address']; ?></td>
					<td><?php echo $value['device']; ?></td>
					<td><?php echo $value['operating_system']; ?></td>
					<td><?php echo $value['browser']; ?></td>
					<td><?php echo $value['url']; ?></td>
					<td><?php echo date('Y-m-d h:i:s', strtotime($value['visited_at'])); ?></td>
				</tr>

					<?php 
						
						}	
					?>
			</tbody>
				</table>
			</div>

		</div>
		
	</div>
</div>

