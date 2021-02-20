<?php
class DBController {
    private $host = '127.0.0.1';
    private $user = "root";
    private $password = "";
    private $database = "sage";
    private $conn;
    
    function __construct() {
        $this->conn = $this->connectDB();
    }   
    
    function connectDB() {
		try
		{
			if (!($conn = mysqli_connect($this->host,$this->user,$this->password,$this->database)))
			{
				throw new Exception('Unable to connect to the database');
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
        return $conn;
    }
	
    function runInsertQuery($query) {
		$this->runQuery($query);
		$insertId = $this->conn->insert_id;
	    return $insertId;
    }
	
    function runQuery($query) {
		try
		{
			if (!$this->conn->query($query))
			{
				throw new Exception('Unable to connect to the database');
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	
    function runSelectQuery($query) {
		try
		{
			if ($result = $this->conn->query($query))
			{
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$resultset[] = $row;
					}
				}
			
				if(!empty($resultset)) {
					return $resultset;
				}
				
			} else {
			    throw new Exception('Unable to connect to the database');
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		
    }
}
?>