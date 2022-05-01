<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Section.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  section object
  $section = new Section($db);

  // Get the ID from the URL
  $section->sectionID = isset($_GET['sectionID']) ? $_GET['sectionID'] : die();

  // Get Section 
  $section->read_single();

  // Create array
  $section_arr = array(
    'sectionID' => $sectionID, 
    'Name' => $Name, 
    'Room' => $Room,
    'courseID' => $courseID, 
    'scheduleID' => $scheduleID, 
    'instructorID' => $instructorID,
  );

  // Make JSON
  print_r(json_encode($section_arr));

  
?>