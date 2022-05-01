<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
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

  // SET ID to delete
  $section->sectionID = $data->sectionID;

  // Delete Section
  if($section->delete()) {
    echo json_encode(
      array('message' => 'Section with ID '. $section->sectionID .' Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Section Not Deleted')
    );
  }

?>