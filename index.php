<?php
require_once ("class/DBController.php");
require_once ("class/Student.php");
require_once ("class/Registration.php");
require_once ("class/Course.php");

$db_handle = new DBController();

$action = "";
if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "course-add":
        if (isset($_POST['add'])) {
            $courseName = $_POST['course-name'];
            $courseDetail = $_POST['course-detail'];
            
            $course = new Course();
            $insertId = $course->addCourse($courseName, $courseDetail);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php?action=course");
            }
        }
        require_once "web/course-add.php";
        break;
    
    case "course-edit":
        $course_id = $_GET["id"];
        $course = new Course();
        
        if (isset($_POST['add'])) {
            $courseName = $_POST['course-name'];
            $courseDetail = $_POST['course-detail'];
            
            
            $course->editCourse($courseName, $courseDetail, $course_id);
            
            header("Location: index.php?action=course");
        }
        
        $result = $course->getCourseById($course_id);
        require_once "web/course-edit.php";
        break;
    
    case "course-delete":
        $course_id = $_GET["id"];
        $course = new Course();
        
        $course->deleteCourse($course_id);
        
        
		if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $noOfRecords = 5;
        $offset = ($page-1) * $noOfRecords;
		
        $course = new Course();
        $totalRows = $course->getCourseCount();
		$totalPages = ceil($totalRows / $noOfRecords);

        $result = $course->getCourseByOffset($offset, $noOfRecords);
        require_once "web/course.php";
        break;
    
    case "course":
		if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $noOfRecords = 5;
        $offset = ($page-1) * $noOfRecords;
		
        $course = new Course();
        $totalRows = $course->getCourseCount();
		$totalPages = ceil($totalRows / $noOfRecords);

        $result = $course->getCourseByOffset($offset, $noOfRecords);
		
        require_once "web/course.php";
        break;
    
    case "student-add":
        if (isset($_POST['add'])) {
            $firstName = $_POST['first-name'];
            $lastName = $_POST['last-name'];
            $dob = "";
            if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $phone = $_POST['phone'];
            
            $student = new Student();
            $insertId = $student->addStudent($firstName, $lastName, $dob, $phone);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php");
            }
        }
        require_once "web/student-add.php";
        break;
    
    case "student-edit":
        $student_id = $_GET["id"];
        $student = new Student();
        
        if (isset($_POST['add'])) {
            $firstName = $_POST['first-name'];
            $lastName = $_POST['last-name'];
            $dob = "";
            if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $phone = $_POST['phone'];
            
            $student->editStudent($firstName, $lastName, $dob, $phone, $student_id);
            
            header("Location: index.php");
        }
        
        $result = $student->getStudentById($student_id);
        require_once "web/student-edit.php";
        break;
    
    case "student-delete":
        $student_id = $_GET["id"];
        $student = new Student();
        
        $student->deleteStudent($student_id);
		
		if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $noOfRecords = 5;
        $offset = ($page-1) * $noOfRecords;
		
        $student = new Student();
        $totalRows = $student->getStudentCount();
		$totalPages = ceil($totalRows / $noOfRecords);

        $result = $student->getStudentByOffset($offset, $noOfRecords);
        
        require_once "web/student.php";
        break;
    
    case "registration-add":
		$student = new Student();
		$students = $student->getAllStudent();
		$course = new Course();
		$courses = $course->getAllCourse();
		if (isset($_POST['add'])) {
			$studentId = $_POST['student_id'];
            $courseId = $_POST['course_id'];
      
			if (is_array($studentId) && is_array($courseId)) {
				for ($i=0; $i < count($studentId); $i++) {
					$registration = new Registration();
					$insertId = $registration->addRegistration($studentId[$i], $courseId[$i]);
					if (empty($insertId)) {
						$response = array(
							"message" => "There was a problem in registering the student. Duplicate registration exists",
							"type" => "error"
						);
					} else {
						$response = [];
						header("Location: index.php?action=registration");
					}
				}
			}
        }
        require_once "web/registration-add.php";
        break;
    
    case "registration":
		if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $noOfRecords = 5;
        $offset = ($page-1) * $noOfRecords;
		
        $registration = new Registration();
        $totalRows = $registration->getRegistrationCount();
		$totalPages = ceil($totalRows / $noOfRecords);

        $result = $registration->getAllRegistration($offset, $noOfRecords);
        require_once "web/registration.php";
        break;
    
    default:
		if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $noOfRecords = 5;
        $offset = ($page-1) * $noOfRecords;
		
        $student = new Student();
        $totalRows = $student->getStudentCount();
		$totalPages = ceil($totalRows / $noOfRecords);

        $result = $student->getStudentByOffset($offset, $noOfRecords);
		
		require_once "web/student.php";
        break;
}
?>