<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Attendance.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  attendance object
  $attendance = new Attendance($db);

  // Get the ID from the URL
  $attendance->AttendanceID = isset($_GET['AttendanceID']) ? $_GET['AttendanceID'] : die();

  // Get Attendance 
  $attendance->read_single();

  // Create array
  $attendance_arr = array(
    'AttendanceID' => $AttendanceID, 
    'DateAttended' => $DateAttended, 
    'Hours' => $Hours, 
    'studentID' => $studentID,
    'sectionID' => $sectionID
  );

  // Make JSON
  print_r(json_encode($attendance_arr));

  
?>