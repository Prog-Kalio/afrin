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

  //  attendance query
  $result = $attendance->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any attendances
  if($num > 0) {
    // Attendance array
    $attendances_arr = array();
    $attendances_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $attendance_item = array(
        'AttendanceID' => $AttendanceID, 
        'DateAttended' => $DateAttended, 
        'Hours' => $Hours, 
        'studentID' => $studentID,
        'sectionID' => $sectionID
      );

      // Push to "data"
      // array_push($attendances_arr, $attendance_item);
      array_push($attendances_arr['data'], $attendance_item);
    }
    // Turn to JSON
    echo json_encode($attendances_arr);
  } else {
    // No Attendances
    echo json_encode(array('message' => 'No attendances found'));
  }

?>