<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Schedule.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  schedule object
  $schedule = new Schedule($db);
  $schedule->createTable();

  // Get raw scheduleed data
  $data = json_decode(file_get_contents("php://input"));

  // Requirements in the Body.
  $schedule->Day = $data->Day;
  $schedule->StartTime = $data->StartTime;
  $schedule->EndTime = $data->EndTime;

  // Create Schedule
  if($schedule->create()) {
    echo json_encode(
      array('message' => 'Schedule Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Schedule Not Created')
    );
  }

?>