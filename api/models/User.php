<?php 
  class User {
    // DB stuff
    private $conn;
    private $table = 'users';

    // Student Properties
    public $email;
    public $name;
    public $password; 
    public $level; 

    // Constructor with DB
    public function __construct($db){
      $this->conn = $db;
    }

    // Get Categories
    public function read() {

      $createTableQuery = '
      CREATE  TABLE IF NOT EXISTS `Users` (
        `id` INT  AUTO_INCREMENT ,
        `email` VARCHAR(150) NOT NULL , 
        `name` VARCHAR(150) NOT NULL , 
        `level` VARCHAR(150) NOT NULL , 
        `password` VARCHAR(255),
        PRIMARY KEY (`id`) );';

      $createTableStmt = $this->conn->prepare($createTableQuery);

      $createTableStmt->execute();

      // Create query
      $query = '
      SELECT 
        *
      FROM
        '. $this->table .'
      ORDER BY
        id
      ';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Student
    public function auth_user() {


      // Create query
      $query = '
      SELECT
        *
      FROM
        '. $this->table .'
      WHERE
        email = :email     
      LIMIT 1
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(":email", $this->email);
      $stmt->execute();

      // Execute query
      $result = $stmt->fetchAll(); 

      //$stmt->fetch(PDO::FETCH_ASSOC);

      $num = count($result);
      if($num > 0){
          //update the name of the user
          if($this->password == $result[0]['password']){
            $this->name = $result[0]['name'];
            $this->level = $result[0]['level'];
            return true;
          }else{
              return false;
          }
      }else{ 
          return false;
      } 
    }

    // Create new Student
    public function create() {
      
      // create query
      $query = '
      INSERT INTO 
      ' . $this->table .'
      SET
        name = :Name,
        email = :Email,
        password = :Password
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->password = htmlspecialchars(strip_tags($this->password)); 
            
      // Bind Data
      $stmt->bindParam(':Name', $this->name); 
      $stmt->bindParam(':Email', $this->email);
      $stmt->bindParam(':Password', $this->password);
      
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
        name = :Name,
        email = :Email,
        password = :Password
      WHERE
        email = :Email AND password = :Password';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->password = htmlspecialchars(strip_tags($this->password)); 
      

      // Bind Data
      $stmt->bindParam(':Name', $this->name); 
      $stmt->bindParam(':Email', $this->email);
      $stmt->bindParam(':Password', $this->password);
      
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
        email = :Email AND password = :Password';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean up data
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->password = htmlspecialchars(strip_tags($this->password)); 

      // Bind Data
      $stmt->bindParam(':Email', $this->email);
      $stmt->bindParam(':Password', $this->password);
      
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