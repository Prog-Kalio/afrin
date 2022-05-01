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