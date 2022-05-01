<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
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

  // SET ID to delete
  $student->studentID = $data->studentID;

  // Delete Student
  if($student->delete()) {
    echo json_encode(
      array('message' => 'Student with ID '. $student->studentID .' Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Student Not Deleted')
    );
  }

?>