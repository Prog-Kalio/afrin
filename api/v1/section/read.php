<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Section.php';
  
  // Instantiate DB $ connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  section object
  $section = new Section($db);

  //  section query
  $result = $section->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any sections
  if($num > 0) {
    // Section array
    $sections_arr = array();
    $sections_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $section_item = array(
        'sectionID' => $sectionID, 
        'Name' => $Name, 
        'Room' => $Room,
        'courseID' => $courseID, 
        'scheduleID' => $scheduleID, 
        'instructorID' => $instructorID,
      );

      // Push to "data"
      // array_push($sections_arr, $section_item);
      array_push($sections_arr['data'], $section_item);
    }
    // Turn to JSON
    echo json_encode($sections_arr);
  } else {
    // No Sections
    echo json_encode(array('message' => 'No sections found'));
  }

?>