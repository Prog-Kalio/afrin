<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Attendance.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  attendance object
  $attendance = new Attendance($db);

  // Get raw attendance data
  $data = json_decode(file_get_contents("php://input"));

  // SET ID to delete
  $attendance->AttendanceID = $data->AttendanceID;

  // Delete Attendance
  if($attendance->delete()) {
    echo json_encode(
      array('message' => 'Attendance with ID '. $attendance->AttendanceID .' Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Attendance Not Deleted')
    );
  }

?>