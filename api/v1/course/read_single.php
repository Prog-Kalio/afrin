<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Course.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  course object
  $course = new Course($db);

  // Get the ID from the URL
  $course->CourseID = isset($_GET['CourseID']) ? $_GET['CourseID'] : die();

  // Get Course 
  $course->read_single();

  // Create array
  $course_arr = array(
    'CourseID' => $CourseID, 
    'Name' => $Name, 
    'Description' => $Description, 
    'Credits' => $Credits,
    'Term' => $Term
  );

  // Make JSON
  print_r(json_encode($course_arr));

  
?>