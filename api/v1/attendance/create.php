<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Attendance.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  attendance object
  $attendance = new Attendance($db);
  $attendance->createTable();

  // Get raw attendanceed data
  $data = json_decode(file_get_contents("php://input"));

  // Requirements in the Body.
  $attendance->DateAttended = $data->DateAttended;
  $attendance->Hours = $data->Hours;
  $attendance->studentID = $data->studentID;
  $attendance->sectionID = $data->sectionID;

  // Create Attendance
  if($attendance->create()) {
    echo json_encode(
      array('message' => 'Attendance Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Attendance Not Created')
    );
  }

?>