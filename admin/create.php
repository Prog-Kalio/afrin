<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard | CREATE</title>
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
                <h4 style="color: white">CREATE A STUDENT</h4>
                <input type="text" name="studentID" value="<?= time()?>" placeholder="Enter the Student ID here"> 
                <input type="text" name="LastName" placeholder="Enter the Student LastName here"> 
                <input type="text" name="FirstName" placeholder="Enter the Student FirstName here"> 
                <input type="email" name="Email" placeholder="Enter the Student Email here"> 
                <input type="text" name="collegeID" placeholder="Enter the Student collegeID here"> 
                <button id="st-btn" class="btnn" style="padding: 5px"> CREATE </button>
              </form>
          </div> 
            
          
          <div class="list-cours" style="width: 1000px; left: 0px;">
              <form class="form" method="post" id="del-cr-form" style="left: 0; margin-top: 40px">
                <h4 style="color: white">CREATE A COURSE</h4>
                <input type="text" name="Name" placeholder="Enter the Name here"> 
                <input type="text" name="Desription" placeholder="Enter the Desription here"> 
                <input type="text" name="Credits" placeholder="Enter the Credits here"> 
                <input type="text" name="Term" placeholder="Enter the Term here">  
                <button id="cr-btn" class="btnn" style="padding: 5px"> CREATE </button>
              
            </form>
          </div> 
          
          <div class="list-cours" style="width: 1000px; left: 0px;">
              <form class="form" method="post" id="del-in-form" style="left: 500px; margin-top: 40px">
                <h4 style="color: white">CREATE A INSTRUCTOR</h4>
                <input type="text" name="InstructorID" value="<?= time(); ?>" placeholder="InstructorID here"> 
                <input type="text" name="CollegeID" placeholder="CollegeID here"> 
                <input type="text" name="LastName" placeholder="LastName here"> 
                <input type="text" name="FirstName" placeholder="FirstName here"> 
                <input type="email" name="Rank" placeholder="Email here"> 
                <input type="text" name="departmentID" placeholder="DepartmentID here"> 
                <button id="in-btn" class="btnn" style="padding: 5px"> CREATE </button>
              
            </form>
          </div> 
             
        </div> 
        <script src="../assets/js/create.js"></script>  
</body> 
</html>   