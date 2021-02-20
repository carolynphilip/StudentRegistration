<?php 
require_once ("class/DBController.php");
class Course {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addCourse($courseName, $courseDetail) {
        $query = "INSERT INTO course (CourseName,CourseDetail) VALUES ('$courseName', '$courseDetail')";
        $insertId = $this->db_handle->runInsertQuery($query);
        return $insertId;
    }
    
    function editCourse($courseName, $courseDetail, $course_id) {
        $query = "UPDATE course SET CourseName = '$courseName',CourseDetail = '$courseDetail' WHERE ID = $course_id";        
        $this->db_handle->runQuery($query);
    }
    
    function deleteCourse($course_id) {
        $query = "DELETE FROM course WHERE ID = $course_id";
        $this->db_handle->runQuery($query);
    }
    
    function getCourseById($course_id) {
        $query = "SELECT * FROM course WHERE ID = $course_id";
        $result = $this->db_handle->runSelectQuery($query);
        return $result;
    }
    
    function getAllCourse() {
        $sql = "SELECT * FROM course ORDER BY ID";
        $result = $this->db_handle->runSelectQuery($sql);
        return $result;
    }
    
    function getCourseCount() {
        $sql = "SELECT Count(*) AS count FROM course ORDER BY ID";
        $result = $this->db_handle->runSelectQuery($sql);
        return $result[0]['count'];
    }
    
    function getCourseByOffset($offset, $noOfRecords) {
        $sql = "SELECT * FROM course ORDER BY ID LIMIT $offset, $noOfRecords";
        $result = $this->db_handle->runSelectQuery($sql);
        return $result;
    }
}
?>