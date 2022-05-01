<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Instructor.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  instructor object
  $instructor = new Instructor($db);

  //  instructor query
  $result = $instructor->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any instructors
  if($num > 0) {
    // Instructor array
    $instructors_arr = array();
    $instructors_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $instructor_item = array(
        'InstructorID' => $InstructorID, 
        'CollegeID' => $CollegeID, 
        'LastName' => $LastName,
        'FirstName' => $FirstName, 
        'Rank' => $Rank, 
        'departmentID' => $departmentID,
      );

      // Push to "data"
      // array_push($instructors_arr, $instructor_item);
      array_push($instructors_arr['data'], $instructor_item);
    }
    // Turn to JSON
    echo json_encode($instructors_arr);
  } else {
    // No Instructors
    echo json_encode(array('message' => 'No instructors found'));
  }

?>