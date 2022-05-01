<?php 
  class Attendance {
    // DB stuff
    private $conn;
    private $table = 'attendance';

    // Attendance Properties
    public $AttendanceID;
    public $DateAttended;
    public $Hours;
    public $studentID;
    public $sectionID;

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE TABLE IF NOT EXISTS `registrationdb`.`attendance` (
        `AttendanceID` VARCHAR(25) NOT NULL,
        `DateAttended` DATE NULL DEFAULT NULL,
        `Hours` TIME NULL DEFAULT NULL,
        `sectionID` INT NULL DEFAULT NULL,
        `studentID` INT NULL DEFAULT NULL,
        PRIMARY KEY (`AttendanceID`),
        UNIQUE INDEX `AttendanceID_UNIQUE` (`AttendanceID` ASC) ,
        INDEX `studentID_idx` (`studentID` ASC) ,
        INDEX `sectionID` (`sectionID` ASC) ,
        CONSTRAINT `sectionID`
          FOREIGN KEY (`sectionID`)
          REFERENCES `registrationdb`.`section` (`sectionID`),
        CONSTRAINT `studentID`
          FOREIGN KEY (`studentID`)
          REFERENCES `registrationdb`.`student` (`studentID`))
      ENGINE = InnoDB
      ';

      $createTableStmt = $this->conn->prepare($createTableQuery);

      $createTableStmt->execute();

      // Create query
      $query = '
      SELECT *
      FROM
        '. $this->table .'
      ORDER BY
        AttendanceID
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Attendance
    public function read_single() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        AttendanceID = ?
      LIMIT 0,1 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->AttendanceID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set the properties
      $this->AttendanceID = $row['AttendanceID'];
      $this->DateAttended = $row['DateAttended'];
      $this->Hours = $row['Hours'];
      $this->studentID = $row['studentID'];
      $this->sectionID = $row['sectionID'];
    }

    // Create new Attendance
    public function create() {
      

      // create query
      $query = '
      INSERT INTO 
      ' . $this->table .'
      SET
        DateAttended = :DateAttended,
        Hours = :Hours,
        studentID = :studentID,
        sectionID = :sectionID
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->DateAttended = htmlspecialchars(strip_tags($this->DateAttended));
      $this->Hours = htmlspecialchars(strip_tags($this->Hours));
      $this->studentID = htmlspecialchars(strip_tags($this->studentID));
      $this->sectionID = htmlspecialchars(strip_tags($this->sectionID));
            
      // Bind Data
      $stmt->bindParam(':DateAttended', $this->DateAttended);
      $stmt->bindParam(':Hours', $this->Hours);
      $stmt->bindParam(':studentID', $this->studentID);
      $stmt->bindParam(':sectionID', $this->sectionID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Attendance
    public function update() {
      // Create query
      $query = '
      UPDATE 
      ' . $this->table .'
      SET
        DateAttended =:DateAttended,
        Hours =:Hours,
        studentID =:studentID,
        sectionID =:sectionID
      WHERE
        AttendanceID = :AttendanceID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->DateAttended = htmlspecialchars(strip_tags($this->DateAttended));
      $this->Hours = htmlspecialchars(strip_tags($this->Hours));
      $this->studentID = htmlspecialchars(strip_tags($this->studentID));
      $this->sectionID = htmlspecialchars(strip_tags($this->sectionID));
      $this->AttendanceID = htmlspecialchars(strip_tags($this->AttendanceID));
      

      // Bind Data
      $stmt->bindParam(':DateAttended', $this->DateAttended);
      $stmt->bindParam(':Hours', $this->Hours);
      $stmt->bindParam(':studentID', $this->studentID);
      $stmt->bindParam(':sectionID', $this->sectionID);
      $stmt->bindParam(':AttendanceID', $this->AttendanceID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Attendance 
    public function delete() {
      // Create query
      $query = '
      DELETE FROM 
      ' . $this->table .'
      WHERE
        AttendanceID = :AttendanceID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->AttendanceID = htmlspecialchars(strip_tags($this->AttendanceID));

      // Bind Data
      $stmt->bindParam(':AttendanceID', $this->AttendanceID);
      
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