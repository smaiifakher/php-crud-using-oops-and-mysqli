<?php

require_once("class/DBController.php");
require_once("class/User.php");

$db_handle = new DBController();

$action = "";
if (!empty($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {

    case "user-add":
        if (isset($_POST['add'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $city = $_POST['city'];
            $state = $_POST['state'];

            $user = new User();
            $insertId = $user->addUser($fname, $lname, $email, $city, $state);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php");
            }
        }
        require_once "web/user-add.php";
        break;

    case "user-edit":
        $user_id = $_GET["id"];
        $user = new User();

        if (isset($_POST['add'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $city = $_POST['city'];
            $state = $_POST['state'];

            $user->editUser($fname, $lname, $city, $state, $user_id);

            header("Location: index.php");
        }

        $result = $user->getUserById($user_id);
        require_once "web/user-edit.php";
        break;

    case "user-delete":
        $user_id = $_GET["id"];
        $user = new User();

        $user->deleteUser($user_id);

        $result = $user->getAllUsers();
        require_once "web/user.php";
        break;

    default:
        $user = new User();
        $result = $user->getAllUsers();
        require_once "web/user.php";
        break;
}
?>