<?php 
  class Schedule {
    // DB stuff
    private $conn;
    private $table = 'schedule';

    // Schedule Properties
    public $ScheduleID;
    public $Day;
    public $StartTime;
    public $EndTime;

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE TABLE IF NOT EXISTS `registrationdb`.`schedule` (
        `ScheduleID` INT NOT NULL,
        `Day` DATE NULL DEFAULT NULL,
        `StartTime` TIME NULL DEFAULT NULL,
        `EndTime` TIME NULL DEFAULT NULL,
        PRIMARY KEY (`ScheduleID`),
        UNIQUE INDEX `ScheduleID_UNIQUE` (`ScheduleID` ASC) )
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
        ScheduleID
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Schedule
    public function read_single() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        ScheduleID = ?
      LIMIT 0,1 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->ScheduleID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set the properties
      $this->ScheduleID = $row['ScheduleID'];
      $this->Day = $row['Day'];
      $this->StartTime = $row['StartTime'];
      $this->EndTime = $row['EndTime'];
    }

    // Create new Schedule
    public function create() {
      

      // create query
      $query = '
      INSERT INTO 
      ' . $this->table .'
      SET
        Day = :Day, 
        StartTime = :StartTime, 
        EndTime = :EndTime 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->Day = htmlspecialchars(strip_tags($this->Day));
      $this->StartTime = htmlspecialchars(strip_tags($this->StartTime));
      $this->EndTime = htmlspecialchars(strip_tags($this->EndTime));
            
      // Bind Data
      $stmt->bindParam(':Day', $this->Day);
      $stmt->bindParam(':StartTime', $this->StartTime);
      $stmt->bindParam(':EndTime', $this->EndTime);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Schedule
    public function update() {
      // Create query
      $query = '
      UPDATE 
      ' . $this->table .'
      SET
        Day =:Day,
        StartTime =:StartTime,
        EndTime =:EndTime
      WHERE
        ScheduleID = :ScheduleID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->Day = htmlspecialchars(strip_tags($this->Day));
      $this->StartTime = htmlspecialchars(strip_tags($this->StartTime));
      $this->EndTime = htmlspecialchars(strip_tags($this->EndTime));
      $this->ScheduleID = htmlspecialchars(strip_tags($this->ScheduleID));
      

      // Bind Data
      $stmt->bindParam(':Day', $this->Day);
      $stmt->bindParam(':StartTime', $this->StartTime);
      $stmt->bindParam(':EndTime', $this->EndTime);
      $stmt->bindParam(':ScheduleID', $this->ScheduleID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Schedule 
    public function delete() {
      // Create query
      $query = '
      DELETE FROM 
      ' . $this->table .'
      WHERE
        ScheduleID = :ScheduleID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->ScheduleID = htmlspecialchars(strip_tags($this->ScheduleID));

      // Bind Data
      $stmt->bindParam(':ScheduleID', $this->ScheduleID);
      
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