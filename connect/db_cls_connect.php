<?php
//Start session
session_start();
//Database connection module
Class dbObj{
	// Database connection start 
	//Database credentials
	var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "cloche";
	var $conn;

	//Function to make connection with the database credentials
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

		//Check if connection error, if error display error and stop process
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} 
		//If success then return the connection
		else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}

?>