<?php 
  class Department {
    // DB stuff
    private $conn;
    private $table = 'department';

    // Department Properties
    public $DepartmentID;
    public $Name;
    public $HOD;
    public $Email;
    public $salary;

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE TABLE IF NOT EXISTS `registrationdb`.`department` (
        `DepartmentID` INT NOT NULL,
        `Name` VARCHAR(45) NULL DEFAULT NULL,
        `HOD` VARCHAR(45) NULL DEFAULT NULL,
        `Email` VARCHAR(45) NULL DEFAULT NULL,
        `salary` DECIMAL(19,4) NULL DEFAULT NULL,
        PRIMARY KEY (`DepartmentID`),
        UNIQUE INDEX `DepartmentID_UNIQUE` (`DepartmentID` ASC) )
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
        DepartmentID
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Department
    public function read_single() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        DepartmentID = ?
      LIMIT 0,1 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->DepartmentID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set the properties
      $this->DepartmentID = $row['DepartmentID'];
      $this->Name = $row['Name'];
      $this->HOD = $row['HOD'];
      $this->Email = $row['Email'];
      $this->salary = $row['salary'];
    }

    // Create new Department
    public function create() {
      

      // create query
      $query = '
      INSERT INTO 
      ' . $this->table .'
      SET
        Name = :Name,
        HOD = :HOD,
        Email = :Email, 
        salary = :salary 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->Name = htmlspecialchars(strip_tags($this->Name));
      $this->HOD = htmlspecialchars(strip_tags($this->HOD));
      $this->Email = htmlspecialchars(strip_tags($this->Email));
      $this->salary = htmlspecialchars(strip_tags($this->salary));
            
      // Bind Data
      $stmt->bindParam(':Name', $this->Name);
      $stmt->bindParam(':HOD', $this->HOD);
      $stmt->bindParam(':Email', $this->Email);
      $stmt->bindParam(':salary', $this->salary);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Department
    public function update() {
      // Create query
      $query = '
      UPDATE 
      ' . $this->table .'
      SET
        Name =:Name,
        HOD =:HOD,
        Email =:Email,
        salary =:salary
      WHERE
        DepartmentID = :DepartmentID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->Name = htmlspecialchars(strip_tags($this->Name));
      $this->HOD = htmlspecialchars(strip_tags($this->HOD));
      $this->Email = htmlspecialchars(strip_tags($this->Email));
      $this->salary = htmlspecialchars(strip_tags($this->salary));
      $this->DepartmentID = htmlspecialchars(strip_tags($this->DepartmentID));
      

      // Bind Data
      $stmt->bindParam(':Name', $this->Name);
      $stmt->bindParam(':HOD', $this->HOD);
      $stmt->bindParam(':Email', $this->Email);
      $stmt->bindParam(':salary', $this->salary);
      $stmt->bindParam(':DepartmentID', $this->DepartmentID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Department 
    public function delete() {
      // Create query
      $query = '
      DELETE FROM 
      ' . $this->table .'
      WHERE
        DepartmentID = :DepartmentID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->DepartmentID = htmlspecialchars(strip_tags($this->DepartmentID));

      // Bind Data
      $stmt->bindParam(':DepartmentID', $this->DepartmentID);
      
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