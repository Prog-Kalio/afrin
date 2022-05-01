<?php session_start();
include_once("classes.php");
include_once("header.php");
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

<!-- Main Content -->
    <div class="content">
          <h1>Kings<br><span>Community</span><br>College</h1>
          
          <p class="par">Registration Requirement<br>
              Each registered student is expected to contact the instructor via official <br>college email during the first week of classes.
              <br> The instructor replies with instructions to access the course website. <br>There are no additional costs associated with the use of the course website.<br>
                The student needs only internet connection and a web browser to interact with the site.</p>

              <button class="cn"><a href="./register.html">REGISTER</a></button>
              <div>
                <div class="my-style"></div> 
              </div>
              <div>
                <div class="my-style">
              </div>
            <form class="form" method="post" id="login-form">
              <h2>Login Here</h2>
              <input type="email" name="email" placeholder="Enter Email Here">
              <input type="password" name="password" placeholder="Enter Password Here">
              <button class="btnn" id="login-btn"><a href="#">Login</a></button>
           </form>
        </div>
    </div>




<?php include_once("footer.php") ?>