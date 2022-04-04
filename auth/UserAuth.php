<?php
require_once("class/DBController.php");
require_once("class/User.php");

class UserAuth
{
    private DBController $db_handle;
    private User $userModel;

    public function __construct()
    {
        $this->db_handle = new DBController();
        $this->userModel = new User();
    }


    public function register($fname, $lname, $email, $city, $country, $password)
    {
        // Check if logged in
        if ($this->isLoggedIn()) {
            return true;
        }

        $data = [
            'email_err' => '',
            'password_err' => '',
            'name_err' => '',
        ];

        // Validate email
        if (empty($email)) {
            $data['email_err'] = 'Please enter an email';
            // Validate name
            if (empty([$lname, $fname])) {
                $data['name_err'] = 'Please enter a name';
            }

        } else {
            // Check Email
            if ($this->userModel->getUserByEmail($email)) {
                $data['email_err'] = 'Email is already taken.';
            }
        }

        // Validate password
        if (empty($password)) {
            $data['password_err'] = 'Please enter a password.';
        }


        // Make sure errors are empty
        if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err'])) {
            // SUCCESS - Proceed to insert

            // Hash Password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //Execute
            if ($this->userModel->register($fname, $lname, $email, $city, $country, $password)) {
                // Redirect to login
                return true;
            } else {
                die('Something went wrong');
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


        // Sanitize POST
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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
                return true;
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
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
    }

// Logout & Destroy Session

    function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        return true;
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