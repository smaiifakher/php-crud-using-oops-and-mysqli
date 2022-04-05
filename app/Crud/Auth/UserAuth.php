<?php

namespace Crud\Auth;

use Crud\Database\DBController;
use Crud\Models\User;

class UserAuth
{
    private DBController $db_handle;
    private User $userModel;

    public function __construct()
    {
        $this->db_handle = new DBController();
        $this->userModel = new User();
    }


    public function register($name, $email, $password)
    {
        $data = [
            'email_err' => '',
            'password_err' => '',
        ];
        // Check if logged in
        if ($this->isLoggedIn()) {
            $data['email_err'] = 'User already logged in';
            return $data;
        }

        // Check Email
        if ($this->userModel->getUserByEmail($email)) {
            $data['email_err'] = 'Email is already taken.';
            return $data;
        }

        // Make sure errors are empty
        if (empty($data['email_err']) && empty($data['password_err'])) {
            // SUCCESS - Proceed to insert

            // Hash Password
            $password = password_hash($password, PASSWORD_DEFAULT);

            //Execute
            $user = $this->userModel->register($name, $email, $password);

            if ($user) {
                // Redirect to login
                return "success";
            } else {
                $data['email_err'] = 'Error in registering.';
                return $data;
            }

        } else {
            // Load View
            return $data;
        }

    }


    function login($email, $password)
    {
        // Check if logged in
        if ($this->isLoggedIn()) {
            return true;
        }

        $data = [
            'email_err' => '',
            'password_err' => '',
        ];

        // Check for email
        if (empty($email)) {
            $data['email_err'] = 'Please enter email.';
        }

        // Check for name
        if (empty($password)) {
            $data['email_err'] = 'Please enter Password.';
        }

        // Check for user
        if (!$this->userModel->getUserByEmail($email)) {
            // No User
            $data['email_err'] = 'This email is not registered.';
        }

        // Make sure errors are empty
        if (empty($data['email_err']) && empty($data['password_err'])) {

            // Check and set logged in user
            $loggedInUser = $this->userModel->login($email, $password);

            if ($loggedInUser) {
                // User Authenticated!
                $this->createUserSession($loggedInUser);
                return "success";
            } else {
                $data['password_err'] = 'Password incorrect.';
                // Load View
                return $data;
            }
        } else {
            // Load View
            return $data;
        }
    }

// Create Session With User Info

    function createUserSession($user)
    {
        $user = $user[0];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
    }

// Logout & Destroy Session

    function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
    }

// Check Logged In

    function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }


}