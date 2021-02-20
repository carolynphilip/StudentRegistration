<?php 
require_once ("class/DBController.php");
class Student
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addStudent($firstName, $lastName, $dob, $phone) {
        $query = "INSERT INTO student (FirstName,LastName,DOB,Phone) VALUES ('$firstName', '$lastName', '$dob', '$phone')";
        $insertId = $this->db_handle->runInsertQuery($query);
        return $insertId;
    }
    
    function editStudent($firstName, $lastName, $dob, $phone, $student_id) {
		
        $query = "UPDATE student SET FirstName = '$firstName',LastName = '$lastName',DOB = '$dob',Phone = '$phone' WHERE ID = $student_id";
        $this->db_handle->runQuery($query);
    }
    
    function deleteStudent($student_id) {
        $query = "DELETE FROM student WHERE ID = $student_id";
        $this->db_handle->runQuery($query);
    }
    
    function getStudentById($student_id) {
        $query = "SELECT * FROM student WHERE ID = $student_id";
        $result = $this->db_handle->runSelectQuery($query);
        return $result;
    }
    
    function getStudentCount() {
        $sql = "SELECT Count(*) AS count FROM student ORDER BY ID";
        $result = $this->db_handle->runSelectQuery($sql);
        return $result[0]['count'];
    }
    
    function getAllStudent() {
        $sql = "SELECT * FROM student ORDER BY ID";
        $result = $this->db_handle->runSelectQuery($sql);
        return $result;
    }
    
    function getStudentByOffset($offset, $noOfRecords) {
        $sql = "SELECT * FROM student ORDER BY ID LIMIT $offset, $noOfRecords";
        $result = $this->db_handle->runSelectQuery($sql);
        return $result;
    }
}
?>