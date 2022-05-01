<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Student.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  student object
  $student = new Student($db);

  // Get the ID from the URL
  $student->studentID = isset($_GET['studentID']) ? $_GET['studentID'] : die();

  // Get Student 
  $student->read_single();

  // Create array
  $student_arr = array(
    'studentID' => $student->studentID, 
    'LastName' => $student->LastName, 
    'FirstName' => $student->FirstName, 
    'Email' => $student->Email, 
    'collegeID' => $student->collegeID, 
  );

  // Make JSON
  print_r(json_encode($student_arr));

  
?>