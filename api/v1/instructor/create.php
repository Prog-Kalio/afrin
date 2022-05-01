<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Instructor.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  instructor object
  $instructor = new Instructor($db);
   
  // Get raw instructored data
  $data = json_decode(file_get_contents("php://input"));

  // Requirements in the Body.
  $instructor->CollegeID = $data->CollegeID;
  $instructor->LastName = $data->LastName;
  $instructor->FirstName = $data->FirstName;
  $instructor->Rank = $data->Rank;
  $instructor->departmentID = $data->departmentID;
  $instructor->InstructorID = time();

  // Create Instructor
  if($instructor->create()) {
    echo json_encode(
      array('message' => 'Instructor Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Instructor Not Created')
    );
  }

?>