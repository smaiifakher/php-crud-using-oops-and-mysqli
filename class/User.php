<?php
require_once("class/DBController.php");

class User
{
    private DBController $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }

    function addUser($fname, $lname, $email, $city, $state)
    {
        $query = "INSERT INTO users (fname,lname,email,city,state) VALUES (?, ?, ?, ?, ?)";
        $paramType = "sissi";
        $paramValue = array(
            $fname,
            $lname,
            $email,
            $city,
            $state
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editUser($fname, $lname, $city, $state, $user_id)
    {
        $query = "UPDATE users SET fname = ?,lname = ?,city = ?,state = ? WHERE id = ?";
        $paramType = "sissi";
        $paramValue = array(
            $fname,
            $lname,
            $city,
            $state,
            $user_id
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function deleteUser($user_id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $user_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getUserById($user_id)
    {
        $query = "SELECT * FROM users WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $user_id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllUsers()
    {
        $sql = "SELECT * FROM users ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}

?>