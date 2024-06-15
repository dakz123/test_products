<?php
session_start();
require_once '../config/database.php';
require_once '../models/User.php';

class AuthController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            if ($this->user->register()) {
                header('Location: ../views/auth/login.php');
            } else {
                echo "Error registering user.";
            }
        } else {
            require '../views/auth/register.php';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['username'];
            $this->user->password = $_POST['password'];

            if ($this->user->login()) {
                $_SESSION['user_id'] = $this->user->id;
                $_SESSION['username'] = $this->user->username;
                $_SESSION['email'] = $this->user->email;
                header('Location: ../views/dashboard.php');
            } else {
                echo "Invalid username or password.";
            }
        } else {
            require '../views/auth/login.php';
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ../views/auth/login.php');
    }
}
?>