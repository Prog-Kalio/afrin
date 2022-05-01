<?php session_start();
include_once("../classes.php");
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard | DELETE</title>
    <link rel="stylesheet" href="../dashboard.css">
</head>
<body>
    <div class="main">
        <div class= "navbar">
            <div class="icon">
                <a class="logo" href="register_home_page.html">
                    <img src="../logo.jpg"  height="50px"></a>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">COURSES</a></li>
                    <li><a href="#">DEPARTMENT</a></li>
                    <li><a href="#">SECTION</a></li>
                    <li><a href="#">ENROLLMENT</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="#">ACTION</a></li>
                </ul>
            </div>
 
        </div>
        <div class="content">
            
            <div style="margin-left: 200px; margin-bottom: ">
                <a href="index.php">BACK TO Home Page</a>
            </div> 
            <br>
          <div class="list-cours" style="width: 1000px; margin-left: auto; margin-right: auto; ">
              <form class="form" method="post" id="del-st-form" style="margin-top: 40px">
                <h4 style="color: white">DELETE A STUDENT</h4>
               <input type="text" name="studentID" placeholder="Enter the Student ID here"> 
               <button id="st-btn" class="btnn" style="padding: 5px"> Delete </button>
            </form>
          </div> 
            
          
          <div class="list-cours" style="width: 1000px; left: 0px;">
              <form class="form" method="post" id="del-cr-form" style="left: 0; margin-top: 40px">
                <h4 style="color: white">DELETE A COURSE</h4>
               <input type="text" name="CourseID" placeholder="Enter the COURSE ID here"> 
               <button id="crbtn" class="btnn" style="padding: 5px"> Delete </button>
            </form>
          </div> 
          
          <div class="list-cours" style="width: 1000px; left: 0px;">
              <form class="form" method="post" id="del-in-form" style="left: 500px; margin-top: 40px">
                <h4 style="color: white">DELETE AN INSTRUCTOR</h4>
                <input type="text" name="InstructorID" placeholder="Enter the INSTRUCTOR ID here"> 
               <button id="inbtn" class="btnn" style="padding: 5px"> Delete </button>
            </form>
          </div> 
             
        </div> 
    <script src="../assets/js/admin.js"></script> 
    <script src="../assets/js/delete.js"></script> 
</body> 
</html>   