<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Schedule.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  schedule object
  $schedule = new Schedule($db);

  // Get raw scheduleed data
  $data = json_decode(file_get_contents("php://input"));

  // SET ID to delete
  $schedule->ScheduleID = $data->ScheduleID;

  // Delete Schedule
  if($schedule->delete()) {
    echo json_encode(
      array('message' => 'Schedule with ID '. $schedule->ScheduleID .' Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Schedule Not Deleted')
    );
  }

?>