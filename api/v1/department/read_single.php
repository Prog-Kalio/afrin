<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Department.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  department object
  $department = new Department($db);

  // Get the ID from the URL
  $department->DepartmentID = isset($_GET['DepartmentID']) ? $_GET['DepartmentID'] : die();

  // Get Department 
  $department->read_single();

  // Create array
  $department_arr = array(
    'DepartmentID' => $DepartmentID, 
    'Name' => $Name, 
    'HOD' => $HOD, 
    'Email' => $Email,
    'salary' => $salary
  );

  // Make JSON
  print_r(json_encode($department_arr));

  
?>