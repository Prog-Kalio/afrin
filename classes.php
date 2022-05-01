<?php 
/*
Author: Mr. Kalio Tamunotonye
Program: Project Afrin
Date: 1st May, 2022
*/


// Including constant
include_once("constants.php");



// Start MyVisitor Class Diagram

	class MyVisitors {

		public $session_id; 
		public $ip_address;
		public $dbcon; //database connection handler


		//create method/function/operation
		function __construct() {
			$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbcon->connect_error){
				die("Connection failed".$this->dbcon->connect_error)."<br>";
			}
			// else {
			// 	echo "Connection successful";
			// }
		}



		function addToAfrin($session_id, $ip_address) {
			
		$sql = "INSERT INTO afrin(session_id, ip_address) VALUES('$session_id', 'ip_address')";

		// check result
		$result = $this->dbcon->query($sql);

			if ($this->dbcon->affected_rows == 1) {
				return true;
			}
			else {
				return false;
			}

		}


		// Get all Users information
		function getFromAfrin($session_id) {
			$sql = "SELECT * FROM afrin WHERE session_id = '$session_id'";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}



		// Get all Users information
		function getAllVisitors() {
			$sql = "SELECT * FROM afrin";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}



		public function deleteDetailFromAfrin($session_id) {
			// write the query
			$sql = "DELETE FROM `afrin` WHERE session_id='$session_id'";
			var_dump($sql);
			// run the query
			$result =$this->dbcon->query($sql);

			$output = array();
			if ($this->dbcon->affected_rows==1) {
				$output['success'] = "Visitor was successfully deleted";
			} 
			elseif ($this->dbcon->affected_rows==0) {
				$output['success'] = "No changes made!";
			}
			else {
				$output['error'] = "An error occured!".$this->dbcon->error;
			}
			
		}

	}

// End MyVisitor class Diagram



?>