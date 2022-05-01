<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
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

  // SET ID to update
  $instructor->InstructorID = $data->InstructorID;

  // Requirements in the Body.
  $instructor->CollegeID = $data->CollegeID;
  $instructor->LastName = $data->LastName;
  $instructor->FirstName = $data->FirstName;
  $instructor->Rank = $data->Rank;
  $instructor->departmentID = $data->departmentID;

  // Update Instructor
  if($instructor->update()) {
    echo json_encode(
      array('message' => 'Instructor with ID '. $instructor->InstructorID .' Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Instructor Not Updated')
    );
  }

?>