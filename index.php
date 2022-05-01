<?php session_start();
include_once("header.php");
include_once("classes.php");

// pick session ID
if (!isset($_SESSION['myvisitors'])) {
	$_SESSION['myvisitors'] = time().rand(); 
}

// Pick IP address
if (!isset($_SESSION['ip_address']))
	$_SESSION['ip_address'] = $_SERVER['HTTP_CLIENT_IP'];
?>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-12" style="text-align: center; min-height: 88vh;">
			<h4 class="card-header">Test Project</h4>
			<p class="card-body">Just a simple website to pick details of visitors</p>
		</div>
	</div>
	
</div>




<?php include_once("footer.php") ?>