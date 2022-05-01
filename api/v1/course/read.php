<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Course.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  course object
  $course = new Course($db);

  //  course query
  $result = $course->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any courses
  if($num > 0) {
    // Course array
    $courses_arr = array();
    $courses_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $course_item = array(
        'CourseID' => $CourseID, 
        'Name' => $Name, 
        'Description' => $Description, 
        'Credits' => $Credits,
        'Term' => $Term
      );

      // Push to "data"
      // array_push($courses_arr, $course_item);
      array_push($courses_arr['data'], $course_item);
    }
    // Turn to JSON
    echo json_encode($courses_arr);
  } else {
    // No Courses
    echo json_encode(array('message' => 'No courses found'));
  }

?>