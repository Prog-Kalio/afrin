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

  //  schedule query
  $result = $schedule->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any schedules
  if($num > 0) {
    // Schedule array
    $schedules_arr = array();
    $schedules_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $schedule_item = array(
        'ScheduleID' => $ScheduleID, 
        'Day' => $Day, 
        'StartTime' => $StartTime,
        'EndTime' => $EndTime, 
      );

      // Push to "data"
      // array_push($schedules_arr, $schedule_item);
      array_push($schedules_arr['data'], $schedule_item);
    }
    // Turn to JSON
    echo json_encode($schedules_arr);
  } else {
    // No Schedules
    echo json_encode(array('message' => 'No schedules found'));
  }

?>