<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
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

  // SET ID to delete
  $instructor->InstructorID = $data->InstructorID;

  // Delete Instructor
  if($instructor->delete()) {
    echo json_encode(
      array('message' => 'Instructor with ID '. $instructor->InstructorID .' Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Instructor Not Deleted')
    );
  }

?>