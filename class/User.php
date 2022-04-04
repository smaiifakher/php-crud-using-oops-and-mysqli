<?php
require_once("class/DBController.php");

class User
{
    private DBController $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }


    function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $paramType = "i";
        $paramValue = array(
            $email
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function login($email, $password)
    {
        $query = ("SELECT * FROM users WHERE email = ? ");
        $paramType = "s";

        $paramValue = array(
            $email,
            $password
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        if ($result)
            $hashed_password = $result[0]["password"];
        if ($hashed_password && password_verify($password, $hashed_password))
            return $result;
        else return false;
    }

    public function register($fname, $lname, $email, $city, $country, $password)
    {
        $query = "INSERT INTO users (fname,lname,email,city,country,password) VALUES (?, ?, ?, ?, ?, ?)";
        $paramType = "sissis";
        $paramValue = array(
            $fname,
            $lname,
            $email,
            $city,
            $country,
            $password
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }


}

?>