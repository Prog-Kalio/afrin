<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Department.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  department object
  $department = new Department($db);

  // Get raw departmented data
  $data = json_decode(file_get_contents("php://input"));

  // SET ID to delete
  $department->DepartmentID = $data->DepartmentID;

  // Delete Department
  if($department->delete()) {
    echo json_encode(
      array('message' => 'Department with ID '. $department->DepartmentID .' Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Department Not Deleted')
    );
  }

?>