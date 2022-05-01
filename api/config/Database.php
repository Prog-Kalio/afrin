<?php 
  class Database {
    // 📄 Database Params
    private $host = 'localhost';
    private $db_name = 'registrationdb'; // db name goes here
    private $username = 'root'; // db Username goes here
    private $password = '';// db password goes here
    private $conn;

    // 🔀 DB Connect function 
    public function connect() {
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host='. $this->host .'; dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      } catch(PDOException $e) {
        echo 'Connection Error: '. $e->getMessage();
      }
      return $this->conn;
    }
  }
?>