<?php 
  class Section {
    // DB stuff
    private $conn;
    private $table = 'section';

    // Section Properties
    public $sectionID;
    public $Name;
    public $Room;
    public $courseID;
    public $scheduleID;
    public $instructorID;

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE TABLE IF NOT EXISTS `registrationdb`.`section` (
        `sectionID` INT NOT NULL,
        `Name` VARCHAR(45) NULL DEFAULT NULL,
        `Room` VARCHAR(45) NULL DEFAULT NULL,
        `courseID` INT NULL DEFAULT NULL,
        `scheduleID` INT NULL DEFAULT NULL,
        `instructorID` INT NULL DEFAULT NULL,
        PRIMARY KEY (`sectionID`),
        UNIQUE INDEX `sectionID_UNIQUE` (`sectionID` ASC) ,
        INDEX `courseID_idx` (`courseID` ASC) ,
        INDEX `scheduleID_idx` (`scheduleID` ASC) ,
        INDEX `instructorID_idx` (`instructorID` ASC) ,
        CONSTRAINT `courseID`
          FOREIGN KEY (`courseID`)
          REFERENCES `registrationdb`.`course` (`CourseID`),
        CONSTRAINT `instructorID`
          FOREIGN KEY (`instructorID`)
          REFERENCES `registrationdb`.`instructor` (`InstructorID`),
        CONSTRAINT `scheduleID`
          FOREIGN KEY (`scheduleID`)
          REFERENCES `registrationdb`.`schedule` (`ScheduleID`))
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
        sectionID
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Section
    public function read_single() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        sectionID = ?
      LIMIT 0,1 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->sectionID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set the properties
      $this->sectionID = $row['sectionID'];
      $this->Room = $row['Room'];
      $this->courseID = $row['courseID'];
      $this->scheduleID = $row['scheduleID'];
      $this->instructorID = $row['instructorID'];
      $this->sectionID = $row['sectionID'];
    }

    // Create new Section
    public function create() {
      

      // create query
      $query = '
      INSERT INTO 
      ' . $this->table .'
      SET
        Name = :Name, 
        Room = :Room,
        courseID = :courseID,
        scheduleID = :scheduleID,
        instructorID = :instructorID
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->Name = htmlspecialchars(strip_tags($this->Name));
      $this->Room = htmlspecialchars(strip_tags($this->Room));
      $this->courseID = htmlspecialchars(strip_tags($this->courseID));
      $this->scheduleID = htmlspecialchars(strip_tags($this->scheduleID));
      $this->instructorID = htmlspecialchars(strip_tags($this->instructorID));
            
      // Bind Data
      $stmt->bindParam(':Name', $this->Name);
      $stmt->bindParam(':Room', $this->Room);
      $stmt->bindParam(':courseID', $this->courseID);
      $stmt->bindParam(':scheduleID', $this->scheduleID);
      $stmt->bindParam(':instructorID', $this->instructorID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Section
    public function update() {
      // Create query
      $query = '
      UPDATE 
      ' . $this->table .'
      SET
        Name =:Name,
        Room =:Room,
        courseID =:courseID,
        scheduleID =:scheduleID,
        instructorID =:instructorID
      WHERE
        sectionID = :sectionID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->Name = htmlspecialchars(strip_tags($this->Name));
      $this->Room = htmlspecialchars(strip_tags($this->Room));
      $this->courseID = htmlspecialchars(strip_tags($this->courseID));
      $this->scheduleID = htmlspecialchars(strip_tags($this->scheduleID));
      $this->instructorID = htmlspecialchars(strip_tags($this->instructorID));
      $this->sectionID = htmlspecialchars(strip_tags($this->sectionID));
      

      // Bind Data
      $stmt->bindParam(':Name', $this->Name);
      $stmt->bindParam(':Room', $this->Room);
      $stmt->bindParam(':courseID', $this->courseID);
      $stmt->bindParam(':scheduleID', $this->scheduleID);
      $stmt->bindParam(':instructorID', $this->instructorID);
      $stmt->bindParam(':sectionID', $this->sectionID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Section 
    public function delete() {
      // Create query
      $query = '
      DELETE FROM 
      ' . $this->table .'
      WHERE
        sectionID = :sectionID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->sectionID = htmlspecialchars(strip_tags($this->sectionID));

      // Bind Data
      $stmt->bindParam(':sectionID', $this->sectionID);
      
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