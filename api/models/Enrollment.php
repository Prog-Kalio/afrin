<?php 
  class Enrollment {
    // DB stuff
    private $conn;
    private $table = 'enrollment';

    // Enrollment Properties
    public $EnrollmentID;
    public $AcademicYear;
    public $Term;
    public $DateEnrolled;
    public $sectionID;
    public $FinalGrade;
    public $MidtermGrade;
    public $studentID;

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE TABLE IF NOT EXISTS `registrationdb`.`enrollment` (
        `EnrollmentID` INT NOT NULL,
        `AcademicYear` VARCHAR(255) NULL DEFAULT NULL,
        `Term` INT NULL DEFAULT NULL,
        `DateEnrolled` DATE NULL DEFAULT NULL,
        `sectionID` INT NULL DEFAULT NULL,
        `FinalGrade` INT NULL DEFAULT NULL,
        `MidtermGrade` INT NULL DEFAULT NULL,
        `studentID` INT NULL DEFAULT NULL,
        PRIMARY KEY (`EnrollmentID`),
        UNIQUE INDEX `EnrollmentID_UNIQUE` (`EnrollmentID` ASC) ,
        INDEX `studentID_idx` (`studentID` ASC) ,
        INDEX `sectionID_idx` (`sectionID` ASC) ,
        CONSTRAINT `FK_sectionenrollment`
          FOREIGN KEY (`sectionID`)
          REFERENCES `registrationdb`.`section` (`sectionID`),
        CONSTRAINT `FK_studentenrollment`
          FOREIGN KEY (`studentID`)
          REFERENCES `registrationdb`.`student` (`studentID`))
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
        EnrollmentID
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Enrollment
    public function read_single() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        EnrollmentID = ?
      LIMIT 0,1 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->EnrollmentID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set the properties
      $this->EnrollmentID = $row['EnrollmentID'];
      $this->AcademicYear = $row['AcademicYear'];
      $this->Term = $row['Term'];
      $this->DateEnrolled = $row['DateEnrolled'];
      $this->sectionID = $row['sectionID'];
      $this->FinalGrade = $row['FinalGrade'];
      $this->MidtermGrade = $row['MidtermGrade'];
      $this->studentID = $row['studentID'];
    }

    // Create new Enrollment
    public function create() {
      

      // create query
      $query = '
      INSERT INTO 
      ' . $this->table .'
      SET
        AcademicYear = :AcademicYear, 
        name = :name,
        name = :name, 
        name = :name, 
        name = :name, 
        name = :name, 
        name = :name, 
        name = :name 
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->AcademicYear = htmlspecialchars(strip_tags($this->AcademicYear));
      $this->Term = htmlspecialchars(strip_tags($this->Term));
      $this->DateEnrolled = htmlspecialchars(strip_tags($this->DateEnrolled));
      $this->sectionID = htmlspecialchars(strip_tags($this->sectionID));
      $this->FinalGrade = htmlspecialchars(strip_tags($this->FinalGrade));
      $this->MidtermGrade = htmlspecialchars(strip_tags($this->MidtermGrade));
      $this->studentID = htmlspecialchars(strip_tags($this->studentID));
            
      // Bind Data
      $stmt->bindParam(':AcademicYear', $this->AcademicYear);
      $stmt->bindParam(':Term', $this->Term);
      $stmt->bindParam(':DateEnrolled', $this->DateEnrolled);
      $stmt->bindParam(':sectionID', $this->sectionID);
      $stmt->bindParam(':FinalGrade', $this->FinalGrade);
      $stmt->bindParam(':MidtermGrade', $this->MidtermGrade);
      $stmt->bindParam(':studentID', $this->studentID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Enrollment
    public function update() {
      // Create query
      $query = '
      UPDATE 
      ' . $this->table .'
      SET
        AcademicYear =:AcademicYear,
        Term =:Term,
        DateEnrolled =:DateEnrolled,
        sectionID =:sectionID,
        FinalGrade =:FinalGrade,
        MidtermGrade =:MidtermGrade,
        studentID =:studentID
      WHERE
        EnrollmentID = :EnrollmentID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->AcademicYear = htmlspecialchars(strip_tags($this->AcademicYear));
      $this->Term = htmlspecialchars(strip_tags($this->Term));
      $this->DateEnrolled = htmlspecialchars(strip_tags($this->DateEnrolled));
      $this->sectionID = htmlspecialchars(strip_tags($this->sectionID));
      $this->FinalGrade = htmlspecialchars(strip_tags($this->FinalGrade));
      $this->MidtermGrade = htmlspecialchars(strip_tags($this->MidtermGrade));
      $this->studentID = htmlspecialchars(strip_tags($this->studentID));
      $this->EnrollmentID = htmlspecialchars(strip_tags($this->EnrollmentID));
      

      // Bind Data
      $stmt->bindParam(':AcademicYear', $this->AcademicYear);
      $stmt->bindParam(':Term', $this->Term);
      $stmt->bindParam(':DateEnrolled', $this->DateEnrolled);
      $stmt->bindParam(':sectionID', $this->sectionID);
      $stmt->bindParam(':FinalGrade', $this->FinalGrade);
      $stmt->bindParam(':MidtermGrade', $this->MidtermGrade);
      $stmt->bindParam(':studentID', $this->studentID);
      $stmt->bindParam(':EnrollmentID', $this->EnrollmentID);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Enrollment 
    public function delete() {
      // Create query
      $query = '
      DELETE FROM 
      ' . $this->table .'
      WHERE
        EnrollmentID = :EnrollmentID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->EnrollmentID = htmlspecialchars(strip_tags($this->EnrollmentID));

      // Bind Data
      $stmt->bindParam(':EnrollmentID', $this->EnrollmentID);
      
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