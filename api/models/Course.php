<?php 
  class Course {
    // DB stuff
    private $conn;
    private $table = 'course';

    // Course Properties
    public $CourseID;
    public $Name;
    public $Desription;
    public $Credits;
    public $Term;

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE TABLE IF NOT EXISTS `registrationdb`.`course` (
        `CourseID` INT NOT NULL,
        `Name` VARCHAR(45) NULL DEFAULT NULL,
        `Description` VARCHAR(45) NULL DEFAULT NULL,
        `Credits` INT NULL DEFAULT NULL,
        `Term` VARCHAR(45) NULL DEFAULT NULL,
        PRIMARY KEY (`CourseID`),
        UNIQUE INDEX `CourseID_UNIQUE` (`CourseID` ASC) )
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
        CourseID
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Course
    public function read_single() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        CourseID = ?
      LIMIT 0,1 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->CourseID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set the properties
      $this->CourseID = $row['CourseID'];
      $this->Name = $row['Name'];
      $this->Desription = $row['Desription'];
      $this->Credits = $row['Credits'];
      $this->Term = $row['Term'];
    }

    // Create new Course
    public function create() {
      

      // create query
      $query = '
      INSERT INTO 
      ' . $this->table .'
      SET
        CourseID = :CourseID,
        Name = :Name, 
        Description = :Description, 
        Credits = :Credits, 
        Term = :Term 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->CourseID = time();
      $this->Name = htmlspecialchars(strip_tags($this->Name));
      $this->Desription = htmlspecialchars(strip_tags($this->Desription));
      $this->Credits = htmlspecialchars(strip_tags($this->Credits));
      $this->Term = htmlspecialchars(strip_tags($this->Term));
            
      // Bind Data
      $stmt->bindParam(':CourseID', $this->CourseID);
      $stmt->bindParam(':Name', $this->Name);
      $stmt->bindParam(':Description', $this->Desription);
      $stmt->bindParam(':Credits', $this->Credits);
      $stmt->bindParam(':Term', $this->Term);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Course
    public function update() {
      // Create query
      $query = '
      UPDATE 
      ' . $this->table .'
      SET
        Name =:Name,
        Description =:Desription,
        Credits =:Credits,
        Term =:Term
      WHERE
        CourseID = :CourseID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->Name = htmlspecialchars(strip_tags($this->Name));
      $this->Desription = htmlspecialchars(strip_tags($this->Desription));
      $this->Credits = htmlspecialchars(strip_tags($this->Credits));
      $this->Term = htmlspecialchars(strip_tags($this->Term));
      $this->CourseID = htmlspecialchars(strip_tags($this->CourseID));
      

      // Bind Data
      $stmt->bindParam(':Name', $this->Name);
      $stmt->bindParam(':Desription', $this->Desription);
      $stmt->bindParam(':Credits', $this->Credits);
      $stmt->bindParam(':Term', $this->Term);
      $stmt->bindParam(':CourseID', $this->CourseID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Course 
    public function delete() {
      // Create query
      $query = '
      DELETE FROM 
      ' . $this->table .'
      WHERE
        CourseID = :CourseID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->CourseID = htmlspecialchars(strip_tags($this->CourseID));

      // Bind Data
      $stmt->bindParam(':CourseID', $this->CourseID);
      
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