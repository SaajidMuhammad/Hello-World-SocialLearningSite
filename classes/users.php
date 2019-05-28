<?php
	class users{
		public $host = "localhost";
		public $username = "root";
		public $pass = "hello_world";
		public $dbname = "localhost";
		public $conn;
		
		public function __construct(){
			$this->conn = new mysqli($this->host, $this->username, $this->pass, $this->db_name);
			if($this->conn->connect_errno){
				die("DB Connact Failed ". $this->conn->connect_errno);
			}
			
		}
		public function cat_shows(){
			$query = $this->conn->query("SELECT * FROM quiz_cat");
			$row=$query->fetch_array(mysqli_assoc);
			if($query->num_rows>0){
				$this->cat[]=$row;
			}
			return $this->cat;
		}
	}
?>