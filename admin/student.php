<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Dashboard</title>
    <link rel="stylesheet" href="../dashboard.css">
    
    <script src="../assets/js/samples.js"></script> 
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
                </ul>
            </div>
 
        </div> 
        <div class="content">
            
            
            <form  method="post" id="save-form" class="center-div">
                <h2 style=" width: 1000px; margin-left: auto; margin-right: auto; text-align: center; margin-bottom: 20px;">
                    ---- REGISTRATION APP ----
                </h2>

                <div class="list-cours " style="width: 900px; margin-left: auto; margin-right: auto; margin-top: 40px">
                  <b>SELECT COURSES</b>
                </div>
                <br />
                <table id ="my-list" class="list-cours" style="width: 900px; margin-left: auto; margin-right: auto; ">
                <tr> 
                  <th>CourseID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Credit</th>
                  <th>Term</th>
                  <th>Action</th>
                </tr>


              </table>
              <br /> 
                <div class="list-cours " style="width: 900px; margin-left: auto; margin-right: auto; ">
                  <b>CHOOSE A SECTION</b>
                </div>
                <br />
                <div>

                <table id ="dep-list" class="list-cours" style="width: 900px; margin-left: auto; margin-right: auto; ">
                    <tr> 
                      <th>SECTIONID</th>
                      <th>Name</th> 
                      <th>ACTION</th> 
                    </tr>
                    <tr> 
                      <th>1</th>
                      <th>UNDERGRADUATE</th> 
                      <th>   
                          <input type="checkbox" name="undergraduate" value="ON" />
                      </th> 
                    </tr> 
                    <tr> 
                      <th>2</th>
                      <th>GRADUATE</th> 
                      <th>   
                          <input type="checkbox" name="graduate" value="ON" />
                      </th> 
                    </tr> 

                  </table> 
                </div>
                <div style="width: 900px; margin-left: auto; margin-right: auto; ">
                    <button class="btnn" id="save-btn">Save Informations</button>
                </div>
                
            </form>
            
        </div>
    </div>
    <footer class="footer">
        <ul>
            <li><a href="AboutUs.html">About Us</a></li>
              <li><a href="ContactUs.html">Contact Us</a></li>
              <li><a href="Privacy&Policy.html">Privacy & Policy </a></a></li>
              <li><a href="imprint.html">Imprint</a>
            </li>
        </ul>
    </div>
</footer>
    <script src="../assets/js/listclasses.js"></script> 
</body> 
</html>   