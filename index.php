<?php

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
//if (!$userAuth->isLoggedIn() || $action == "user-register") {
//    $action = "user-login";
//}
switch ($action) {
    case "user-login":
        login:
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $city = $_POST['password'];

            $user = new UserAuth();
            $logged = $user->login($email, $city);
            if ($logged === true) {
                header("Location: index.php");
            } else {
                $response = array(
                    "message" => "Problem in Lodging",
                    "type" => "error"
                );
            }
        }
        require_once "web/auth/user-login.php";
        break;

    case "user-register":
        if (isset($_POST['register'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = trim($_POST['email']);
            $city = $_POST['city'];
            $country = $_POST['country'];
            $password = $_POST['password'];

            $user = new UserAuth();
            $registred = $user->register($fname, $lname, $email, $city, $country, $password);
            if ($registred === true) {
                goto login;
            } else {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            }
        }
        require_once "web/auth/user-register.php";
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

            header("Location: index.php");
        }

        $result = $student->getStudentById($student_id);
        require_once "web/student-edit.php";
        break;

    case "student-delete":
        $student_id = $_GET["id"];
        $student = new Student();

        $student->deleteStudent($student_id);

        $result = $student->getAllStudents();
        require_once "web/student.php";
        break;

    default:

        $student = new Student();
        $result = $student->getAllStudents();
        require_once "web/student.php";
        break;
}
?>