<?php
class Database{
	
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "13020200002_asistensi2_4"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Tidak Dapat Terhubung Pada Mysqli: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>