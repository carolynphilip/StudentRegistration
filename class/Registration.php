<?php 
require_once ("class/DBController.php");
class Registration {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addRegistration($studentID, $courseID) {
        $query = "INSERT INTO registration (StudentID,CourseID) VALUES ($studentID, $courseID)";
        $insertId = $this->db_handle->runInsertQuery($query);
        return $insertId;
    }
    
    function getRegistrationCount() {
        $sql = "SELECT Count(*) AS count FROM registration R LEFT JOIN student S ON R.StudentID = S.ID LEFT JOIN course C ON R.CourseID = C.ID";
        $result = $this->db_handle->runSelectQuery($sql);
        return $result[0]['count'];
    }
    
    function getAllRegistration($offset, $noOfRecords) {
        $sql = "SELECT concat(S.FirstName,' ',S.LastName) AS Name, C.CourseName AS CourseName FROM registration R LEFT JOIN student S ON R.StudentID = S.ID LEFT JOIN course C ON R.CourseID = C.ID LIMIT $offset, $noOfRecords";
        $result = $this->db_handle->runSelectQuery($sql);
        return $result;
    }
}
?>