<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Department.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  department object
  $department = new Department($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // SET ID to update
  $department->DepartmentID = $data->DepartmentID;

  // Requirements in the Body.
  $department->Name = $data->Name;
  $department->HOD = $data->HOD;
  $department->Email = $data->Email;
  $department->salary = $data->salary;


  // Update Department
  if($department->update()) {
    echo json_encode(
      array('message' => 'Department with ID '. $department->DepartmentID .' Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Department Not Updated')
    );
  }

?>