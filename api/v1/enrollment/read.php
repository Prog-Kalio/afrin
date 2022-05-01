<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Enrollment.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  enrollment object
  $enrollment = new Enrollment($db);

  //  enrollment query
  $result = $enrollment->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any enrollments
  if($num > 0) {
    // Enrollment array
    $enrollments_arr = array();
    $enrollments_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $enrollment_item = array(
        'EnrollmentID' => $enrollment->EnrollmentID, 
        'AcademicYear' => $enrollment->AcademicYear, 
        'Term' => $enrollment->Term, 
        'DateEnrolled' => $enrollment->DateEnrolled,  
        'sectionID' => $enrollment->sectionID,
        'FinalGrade' => $enrollment->FinalGrade,
        'MidtermGrade' => $enrollment->MidtermGrade,
        'studentID' => $enrollment->studentID
      );

      // Push to "data"
      // array_push($enrollments_arr, $enrollment_item);
      array_push($enrollments_arr['data'], $enrollment_item);
    }
    // Turn to JSON
    echo json_encode($enrollments_arr);
  } else {
    // No Enrollments
    echo json_encode(array('message' => 'No enrollments found'));
  }

?>