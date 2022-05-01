<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Enrollment.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  enrollment object
  $enrollment = new Enrollment($db);

  // Get the ID from the URL
  $enrollment->EnrollmentID = isset($_GET['EnrollmentID']) ? $_GET['EnrollmentID'] : die();

  // Get Enrollment 
  $enrollment->read_single();

  // Create array
  $enrollment_arr = array(
    'EnrollmentID' => $enrollment->EnrollmentID, 
    'AcademicYear' => $enrollment->AcademicYear, 
    'Term' => $enrollment->Term, 
    'DateEnrolled' => $enrollment->DateEnrolled,  
    'sectionID' => $enrollment->sectionID,
    'FinalGrade' => $enrollment->FinalGrade,
    'MidtermGrade' => $enrollment->MidtermGrade,
    'studentID' => $enrollment->studentID
  );

  // Make JSON
  print_r(json_encode($enrollment_arr));

  
?>