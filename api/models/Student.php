<?php 
  class Student {
    // DB stuff
    private $conn;
    private $table = 'student';

    // Student Properties
    public $studentID;
    public $LastName;
    public $FirstName;
    public $Email;
    public $collegeID;
    public $password;

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE TABLE IF NOT EXISTS `registrationdb`.`student` (
        `studentID` INT NOT NULL,
        `LastName` VARCHAR(45) NULL DEFAULT NULL,
        `FirstName` VARCHAR(45) NULL DEFAULT NULL,
        `Email` VARCHAR(45) NULL DEFAULT NULL,
        `collegeID` VARCHAR(255) NULL DEFAULT NULL,
        PRIMARY KEY (`studentID`),
        UNIQUE INDEX `studentID_UNIQUE` (`studentID` ASC) )
      ENGINE = InnoDB
      ';

      $createTableStmt = $this->conn->prepare($createTableQuery);

      $createTableStmt->execute();

      // Create query
      $query = '
      SELECT 
        *
      FROM
        '. $this->table .'
      ORDER BY
        studentID
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Student
    public function read_single() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        studentID = ?
      LIMIT 0,1 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->studentID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set the properties
      $this->studentID = $row['studentID'];
      $this->LastName = $row['LastName'];
      $this->FirstName = $row['FirstName'];
      $this->Email = $row['Email'];
      $this->collegeID = $row['collegeID'];
      
      
    }

    // Create new Student
    public function create() {
      

      
      // Clean up data
      $this->LastName = htmlspecialchars(strip_tags($this->LastName));
      $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
      $this->Email = htmlspecialchars(strip_tags($this->Email));
      $this->collegeID = htmlspecialchars(strip_tags($this->collegeID));
      $this->studentID = htmlspecialchars(strip_tags($this->studentID)); 
      $id = $this->studentID;
      $colID = $this->collegeID;
      $query = "INSERT INTO users "
              . "SET name = '". $this->LastName."',"
              . " email = '".$this->Email."',"
              . " password = '".$this->password."';"
              
              . " INSERT INTO student SET Lastname = '".$this->LastName."',"
              . " FirstName= '".$this->FirstName."',"
              . " Email = '".$this->Email."',"
              . " studentID = '". $this->studentID."', "
              . "collegeID ='".$this->collegeID."'; "; 
      // create query
//      $query = "
//      BEGIN
//      INSERT INTO student (LastName, FirstName, Email,studentID, collegeID ) VALUES('".$this->LastName."', '".$this->FirstName."', '".$this->Email."', ".$id.", ".$colID."); 
//      INSERT INTO  users  (name, email, password) VALUES('".$this->FirstName."',"
//              . " '".$this->Email."', "
//              . "'".$this->password ."'); 
//      
//      COMMIT;
//      "; 

      // Prepare statement
      $stmt = $this->conn->prepare($query);
            
      // Bind Data
//      $stmt->bindParam(":LastName", $this->LastName);
//      $stmt->bindParam(":FirstName", $this->FirstName);
//      $stmt->bindParam(":Email", $this->Email); 
      
      // Execute query
      if($stmt->execute()) {
          return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Student
    public function update() {
      // Create query
      $query = '
      UPDATE 
      ' . $this->table .'
      SET
        LastName =:LastName,
        FirstName =:FirstName,
        Email =:Email,
        collegeID =:collegeID
      WHERE
        studentID = :studentID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->LastName = htmlspecialchars(strip_tags($this->LastName));
      $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
      $this->Email = htmlspecialchars(strip_tags($this->Email));
      $this->collegeID = htmlspecialchars(strip_tags($this->collegeID));
      $this->studentID = htmlspecialchars(strip_tags($this->studentID));
      

      // Bind Data
      $stmt->bindParam(':LastName', $this->LastName);
      $stmt->bindParam(':FirstName', $this->FirstName);
      $stmt->bindParam(':Email', $this->Email);
      $stmt->bindParam(':collegeID', $this->collegeID);
      $stmt->bindParam(':studentID', $this->studentID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Student 
    public function delete() {
      // Create query
      $query = '
      DELETE FROM 
      ' . $this->table .'
      WHERE
        studentID = :studentID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->studentID = htmlspecialchars(strip_tags($this->studentID));

      // Bind Data
      $stmt->bindParam(':studentID', $this->studentID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }
      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }
  }
?>