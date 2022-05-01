<?php 
  class Instructor {
    // DB stuff
    private $conn;
    private $table = 'instructor';

    // Instructor Properties
    public $InstructorID;
    public $CollegeID;
    public $LastName;
    public $FirstName;
    public $Rank;
    public $departmentID;

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE TABLE IF NOT EXISTS `registrationdb`.`instructor` (
        `InstructorID` INT NOT NULL,
        `CollegeID` VARCHAR(45) NULL DEFAULT NULL,
        `LastName` VARCHAR(45) NULL DEFAULT NULL,
        `FirstName` VARCHAR(45) NULL DEFAULT NULL,
        `Rank` VARCHAR(45) NULL DEFAULT NULL,
        `departmentID` INT NULL DEFAULT NULL,
        PRIMARY KEY (`InstructorID`),
        UNIQUE INDEX `InstructorID_UNIQUE` (`InstructorID` ASC) ,
        INDEX `departmentID_idx` (`departmentID` ASC) ,
        CONSTRAINT `departmentID`
          FOREIGN KEY (`departmentID`)
          REFERENCES `registrationdb`.`department` (`DepartmentID`))
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
        InstructorID
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Instructor
    public function read_single() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        InstructorID = ?
      LIMIT 0,1 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->InstructorID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set the properties
      $this->InstructorID = $row['InstructorID'];
      $this->CollegeID = $row['CollegeID'];
      $this->LastName = $row['LastName'];
      $this->Rank = $row['Rank'];
      $this->departmentID = $row['departmentID'];
      $this->created_at = $row['created_at'];
    }

    // Create new Instructor
    public function create() {
      

      // create query
      $query = '
      INSERT INTO 
      ' . $this->table .'
      SET
        InstructorID = :InstructorID,
        CollegeID = :CollegeID,
        LastName = :LastName, 
        FirstName = :FirstName, 
        Rank = :Rank, 
        departmentID = :departmentID 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->CollegeID = htmlspecialchars(strip_tags($this->CollegeID));
      $this->LastName = htmlspecialchars(strip_tags($this->LastName));
      $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
      $this->Rank = htmlspecialchars(strip_tags($this->Rank));
      $this->departmentID = htmlspecialchars(strip_tags($this->departmentID));
            
      // Bind Data
      $stmt->bindParam(':InstructorID', $this->InstructorID);
      $stmt->bindParam(':CollegeID', $this->CollegeID);
      $stmt->bindParam(':LastName', $this->LastName);
      $stmt->bindParam(':FirstName', $this->FirstName);
      $stmt->bindParam(':Rank', $this->Rank);
      $stmt->bindParam(':departmentID', $this->departmentID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Instructor
    public function update() {
      // Create query
      $query = '
      UPDATE 
      ' . $this->table .'
      SET
        CollegeID =:CollegeID,
        LastName =:LastName,
        FirstName =:FirstName,
        Rank =:Rank,
        departmentID =:departmentID
      WHERE
        InstructorID = :InstructorID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->CollegeID = htmlspecialchars(strip_tags($this->CollegeID));
      $this->LastName = htmlspecialchars(strip_tags($this->LastName));
      $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
      $this->Rank = htmlspecialchars(strip_tags($this->Rank));
      $this->departmentID = htmlspecialchars(strip_tags($this->departmentID));
      $this->InstructorID = htmlspecialchars(strip_tags($this->InstructorID));
      

      // Bind Data
      $stmt->bindParam(':CollegeID', $this->CollegeID);
      $stmt->bindParam(':LastName', $this->LastName);
      $stmt->bindParam(':FirstName', $this->FirstName);
      $stmt->bindParam(':Rank', $this->Rank);
      $stmt->bindParam(':departmentID', $this->departmentID);
      $stmt->bindParam(':InstructorID', $this->InstructorID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Instructor 
    public function delete() {
      // Create query
      $query = '
      DELETE FROM 
      ' . $this->table .'
      WHERE
        InstructorID = :InstructorID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->InstructorID = htmlspecialchars(strip_tags($this->InstructorID));

      // Bind Data
      $stmt->bindParam(':InstructorID', $this->InstructorID);
      
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