<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Instructor.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  instructor object
  $instructor = new Instructor($db);

  // Get the ID from the URL
  $instructor->InstructorID = isset($_GET['InstructorID']) ? $_GET['InstructorID'] : die();

  // Get Instructor 
  $instructor->read_single();

  // Create array
  $instructor_arr = array(
    'InstructorID' => $InstructorID, 
    'CollegeID' => $CollegeID, 
    'LastName' => $LastName,
    'FirstName' => $FirstName, 
    'Rank' => $Rank, 
    'departmentID' => $departmentID,
  );

  // Make JSON
  print_r(json_encode($instructor_arr));

  
?>