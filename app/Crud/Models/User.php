<?php

namespace Crud\Models;


use Crud\Database\DBController;

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
        $paramType = "s";
        $paramValue = array(
            $email
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $paramType = "s";
        $paramValue = array(
            $email,
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        $hashed_password = $result[0]["password"];
        if (password_verify($password, $hashed_password))
            return $result;
        else return false;
    }

    public function register($name, $email, $password)
    {
        $query = "INSERT INTO users (name,email,password) VALUES (?, ?, ?)";
        $paramType = "sss";
        $paramValue = array(
            $name,
            $email,
            $password
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

}

?>