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

  //  department query
  $result = $department->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any departments
  if($num > 0) {
    // Department array
    $departments_arr = array();
    $departments_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $department_item = array(
        'DepartmentID' => $DepartmentID, 
        'Name' => $Name, 
        'HOD' => $HOD, 
        'Email' => $Email,
        'salary' => $salary
      );

      // Push to "data"
      // array_push($departments_arr, $department_item);
      array_push($departments_arr['data'], $department_item);
    }
    // Turn to JSON
    echo json_encode($departments_arr);
  } else {
    // No Departments
    echo json_encode(array('message' => 'No departments found'));
  }

?>