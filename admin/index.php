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
    <title>Admin | Dashboard</title>
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
            
            <div style="margin-left: 200px">
                <a href="create.php">Create  Course / Strudent /Instructor</a>
            </div> 
            <div style="margin-left: 200px">
                <a href="delete.php">DELETE Course / Strudent / Instructor</a>
            </div> 
          <table class="list-cours" style="width: 1000px; margin-left: auto; margin-right: auto; ">
            <tr>
                <th>LIST OF COURSES</th>
                
            </tr> 
          </table>
            <table id ="my-list" class="list-cours" style="width: 900px; margin-left: auto; margin-right: auto; ">
            <tr> 
              <th>CourseID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Credit</th>
              <th>Term</th> 
            </tr>
             
            
          </table>
            
            
          <table class="list-cours" style="width: 1000px; margin-left: auto; margin-right: auto; margin-top: 40px ">
            <tr>
                <th>LIST OF DEPARTMENTS</th>
            </tr> 
          </table>
            <table id ="dep-list" class="list-cours" style="width: 900px; margin-left: auto; margin-right: auto; ">
            <tr> 
              <th>DepartmentID</th>
              <th>Name</th>
              <th>HOD</th>
              <th>Email</th>
              <th>salary</th> 
            </tr>
          </table>
            
            
            
          <table class="list-cours" style="width: 1000px; margin-left: auto; margin-right: auto; margin-top: 40px ">
            <tr>
                <th>LIST OF Students</th>
            </tr> 
          </table>
            <table id ="st-list" class="st-cours" style="width: 900px; margin-left: auto; margin-right: auto; ">
            <tr> 
              <th>studentID</th>
              <th>LastName</th>
              <th>FirstName</th>
              <th>Email</th>
              <th>collegeID</th> 
            </tr>
          </table>
            
          <table class="list-cours" style="width: 1000px; margin-left: auto; margin-right: auto; margin-top: 40px ">
            <tr>
                <th>LIST OF Instructors</th>
            </tr> 
          </table>
            <table id ="in-list" class="st-cours" style="width: 900px; margin-left: auto; margin-right: auto; ">
            <tr> 
              <th>InstructorID</th>
              <th>CollegeID</th>
              <th>LastName</th>
              <th>FirstName</th>
              <th>Rank</th> 
              <th>departmentID</th> 
            </tr>
          </table>
            
             
        </div>
    </div>  
    <script src="../assets/js/adminlist.js"></script> 
</body> 
</html>   