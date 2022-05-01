<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Course.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  course object
  $course = new Course($db);

  // Get raw courseed data
  $data = json_decode(file_get_contents("php://input"));

  // SET ID to update
  $course->CourseID = $data->CourseID;

  // Requirements in the Body.
  $course->Name = $data->Name;
  $course->Desription = $data->Desription;
  $course->Credits = $data->Credits;
  $course->Term = $data->Term;

  // Update Course
  if($course->update()) {
    echo json_encode(
      array('message' => 'Course with ID '. $course->CourseID .' Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Course Not Updated')
    );
  }

?>