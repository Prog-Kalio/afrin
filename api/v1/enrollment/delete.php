<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Enrollment.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  enrollment object
  $enrollment = new Enrollment($db);

  // Get raw enrollmented data
  $data = json_decode(file_get_contents("php://input"));

  // SET ID to delete
  $enrollment->EnrollmentID = $data->EnrollmentID;

  // Delete Enrollment
  if($enrollment->delete()) {
    echo json_encode(
      array('message' => 'Enrollment with ID '. $enrollment->EnrollmentID .' Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Enrollment Not Deleted')
    );
  }

?>