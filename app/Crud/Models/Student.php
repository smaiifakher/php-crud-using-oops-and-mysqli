<?php

namespace Crud\Models;

use Crud\Database\DBController;


class Student
{
    private DBController $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }

    function addStudent($name, $roll_number, $email, $class)
    {
        $query = "INSERT INTO tbl_student (name,roll_number,email,class) VALUES (?, ?, ?, ?)";
        $paramType = "siss";
        $paramValue = array(
            $name,
            $roll_number,
            $email,
            $class
        );


        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editStudent($name, $roll_number, $email, $class, $student_id)
    {
        $query = "UPDATE tbl_student SET name = ?,roll_number = ?,email = ?,class = ? WHERE id = ?";
        $paramType = "sissi";
        $paramValue = array(
            $name,
            $roll_number,
            $class,
            $email,
            $student_id
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function deleteStudent($student_id)
    {
        $query = "DELETE FROM tbl_student WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getStudentById($student_id)
    {
        $query = "SELECT * FROM tbl_student WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }


    function getAllStudents()
    {
        $sql = "SELECT * FROM tbl_student ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}

