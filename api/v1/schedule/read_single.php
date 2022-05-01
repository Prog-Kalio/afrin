<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Schedule.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  schedule object
  $schedule = new Schedule($db);

  // Get the ID from the URL
  $schedule->ScheduleID = isset($_GET['ScheduleID']) ? $_GET['ScheduleID'] : die();

  // Get Schedule 
  $schedule->read_single();

  // Create array
  $schedule_arr = array(
    'ScheduleID' => $schedule->ScheduleID, 
    'Day' => $schedule->Day, 
    'StartTime' => $schedule->StartTime, 
    'EndTime' => $schedule->EndTime, 
  );

  // Make JSON
  print_r(json_encode($schedule_arr));

  
?>