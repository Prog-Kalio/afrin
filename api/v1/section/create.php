<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Section.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  section object
  $section = new Section($db);
  $section->createTable();

  // Get raw sectioned data
  $data = json_decode(file_get_contents("php://input"));

  // Requirements in the Body.
  $section->Name = $data->Name;
  $section->Room = $data->Room;
  $section->courseID = $data->courseID;
  $section->scheduleID = $data->scheduleID;
  $section->instructorID = $data->instructorID;

  // Create Section
  if($section->create()) {
    echo json_encode(
      array('message' => 'Section Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Section Not Created')
    );
  }

?>