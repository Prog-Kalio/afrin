<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Student.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  student object
  $student = new Student($db);

  // Get raw studented data
  $data = json_decode(file_get_contents("php://input"));

  // SET ID to update
  $student->studentID = $data->studentID;

  // Requirements in the Body.
  $student->LastName = $data->LastName;
  $student->FirstName = $data->FirstName;
  $student->Email = $data->Email;
  $student->collegeID = $data->collegeID;

  // Update Student
  if($student->update()) {
    echo json_encode(
      array('message' => 'Student with ID '. $student->studentID .' Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Student Not Updated')
    );
  }

?>