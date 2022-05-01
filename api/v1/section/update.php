<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Section.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  section object
  $section = new Section($db);

  // Get raw sectioned data
  $data = json_decode(file_get_contents("php://input"));

  // SET ID to update
  $section->sectionID = $data->sectionID;

  // Requirements in the Body.
  $section->Name = $data->Name;
  $section->Room = $data->Room;
  $section->courseID = $data->courseID;
  $section->scheduleID = $data->scheduleID;
  $section->instructorID = $data->instructorID;

  // Update Section
  if($section->update()) {
    echo json_encode(
      array('message' => 'Section with ID '. $section->sectionID .' Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Section Not Updated')
    );
  }

?>