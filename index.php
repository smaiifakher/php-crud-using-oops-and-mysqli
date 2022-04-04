<?php
session_start();

require_once("class/DBController.php");
require_once("class/User.php");
require_once("class/Student.php");
require_once("auth/UserAuth.php");

$db_handle = new DBController();
$userAuth = new UserAuth();
$action = "";
if (!empty($_GET["action"])) {
    $action = $_GET["action"];
}

if (!isset($_SESSION['user_id']) && $action != "user-register" && $action != "user-logout") {
    $action = "user-login";
}

// Sanitize POST
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

switch ($action) {
    case "user-login":
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new UserAuth();
            $logged = $user->login($email, $password);
            if ($logged == "success") {
                header("Location: index.php");
            } else {
                $response = array(
                    "message" => "Problem in Logging",
                    "type" => "error"
                );
            }
        }
        require_once "web/auth/user-login.php";
        break;

    case "user-register":
        if (isset($_POST['register'])) {
            $name = $_POST['name'];
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty([$name, $email, $password])) {
                $response = array(
                    "message" => "Problem in Data Provided",
                    "type" => "error"
                );
                break;
            }

            $user = new UserAuth();
            $registred = $user->register($name, $email, $password);
            if ($registred == "success") {
                header("location: index.php?action=user-login");
                break;
            } else {
                $response = array(
                    "message" => "Please Try Again ",
                    "type" => "error"
                );
            }
        }
        require_once "web/auth/user-register.php";
        break;

    case "user-logout":
        $user = new UserAuth();
        $user->logout();
        header('Location: index.php?action=user-login');
        break;

    case "student-add":
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $roll_number = $_POST['roll_number'];
            $email = trim($_POST['email']);
            $class = $_POST['class'];

            $student = new Student();
            $insertId = $student->addStudent($name, $roll_number, $email, $class);
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

        if (isset($_POST['edit'])) {
            $name = $_POST['name'];
            $roll_number = $_POST['roll_number'];
            $email = $_POST['email'];
            $class = $_POST['class'];

            $student->editStudent($name, $roll_number, $email, $class, $student_id);

            $response = array(
                "message" => "Record Updated Successfully",
                "type" => "success"
            );
            header("Location: index.php");

        }

        $result = $student->getStudentById($student_id);
        require_once "web/student-edit.php";
        break;

    case "student-delete":
        $student_id = $_GET["id"];
        $student = new Student();

        $student->deleteStudent($student_id);

        $response = array(
            "message" => "Record Deleted Successfully",
            "type" => "success"
        );
        $result = $student->getAllStudents();

        require_once "web/student.php";
        break;

    default:
        $student = new Student();
        $result = $student->getAllStudents();

        $response = array(
            "message" => "Welcome Home",
            "type" => "success"
        );
        require_once "web/student.php";
        break;
}
?>