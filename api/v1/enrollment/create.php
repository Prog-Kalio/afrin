<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Enrollment.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  enrollment object
  $enrollment = new Enrollment($db);
  $enrollment->createTable();

  // Get raw enrollmented data
  $data = json_decode(file_get_contents("php://input"));

  // Requirements in the Body.
  $enrollment->AcademicYear = $data->AcademicYear;
  $enrollment->Term = $data->Term;
  $enrollment->DateEnrolled = $data->DateEnrolled;
  $enrollment->sectionID = $data->sectionID;
  $enrollment->FinalGrade = $data->FinalGrade;
  $enrollment->MidtermGrade = $data->MidtermGrade;
  $enrollment->studentID = $data->studentID;

  // Create Enrollment
  if($enrollment->create()) {
    echo json_encode(
      array('message' => 'Enrollment Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Enrollment Not Created')
    );
  }

?>