<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Department.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  department object
  $department = new Department($db);
  $department->createTable();

  // Get raw departmented data
  $data = json_decode(file_get_contents("php://input"));

  // Requirements in the Body.
  $department->Name = $data->Name;
  $department->HOD = $data->HOD;
  $department->Email = $data->Email;
  $department->salary = $data->salary;

  // Create Department
  if($department->create()) {
    echo json_encode(
      array('message' => 'Department Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Department Not Created')
    );
  }

?>