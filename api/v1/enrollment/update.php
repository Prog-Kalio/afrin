<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
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

  // SET ID to update
  $enrollment->EnrollmentID = $data->EnrollmentID;

  // Requirements in the Body.
  $enrollment->AcademicYear = $data->AcademicYear;
  $enrollment->Term = $data->Term;
  $enrollment->DateEnrolled = $data->DateEnrolled;
  $enrollment->sectionID = $data->sectionID;
  $enrollment->FinalGrade = $data->FinalGrade;
  $enrollment->MidtermGrade = $data->MidtermGrade;
  $enrollment->studentID = $data->studentID;

  // Update Enrollment
  if($enrollment->update()) {
    echo json_encode(
      array('message' => 'Enrollment with ID '. $enrollment->EnrollmentID .' Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Enrollment Not Updated')
    );
  }

?>