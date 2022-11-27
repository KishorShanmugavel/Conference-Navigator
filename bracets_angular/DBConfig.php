<?php

class DbConfig {
	private $conn;
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "conference";

    private static $instance; 
    
	public function __construct() {
        // Connection
		$this->conn = new mysqli($this->hostname, $this->username,
		$this->password, $this->database);

		// Error Check
		/*if($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
        }
        else{
            echo"Connection Successful";
        }*/

        if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), 
				E_USER_ERROR);
        }
        /*else{
            echo"Connection Successful";
        }*/
	
	}

	public static function getInstance() {
		if(!self::$instance) { 
		    self::$instance = new self();
		}
		return self::$instance;
	}

	// Get mysqli connection
	public function getConnection() {
		return $this->conn;
	}

}

?>