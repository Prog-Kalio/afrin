<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Student.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  student object
  $student = new Student($db);
  // $student->createTable();

  // Get raw studented data
  $data = json_decode(file_get_contents("php://input"));

  // Requirements in the Body.
  $student->LastName = $data->LastName;
  $student->FirstName = $data->FirstName;
  $student->Email = $data->Email;
  $student->collegeID = $data->collegeID;
  $student->password = hash('sha256', trim($data->password)); 
  $student->studentID = time();

  // Create Student
  if($student->create()) {
    echo json_encode(
      array('message' => 'Student Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Student Not Created')
    );
  }

?>