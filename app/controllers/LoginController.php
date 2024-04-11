<?php

session_start();
require_once('../app/models/LoginModel.php');

class LoginController extends LoginModel {
    public function showLoginForm() {
        require_once('../app/views/login/login.php');
    }

    public function processLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $loginModel = new LoginModel();
            $user = $loginModel->validateUser($username, $password);

            if ($user) {
                // Store username in session
                $_SESSION['username'] = $username;
                
                // Redirect to user or admin panel based on user level
                if ($user['user_level_fk'] == "2") {
                    header("Location: index.php?page=user");
                } elseif ($user['user_level_fk'] == "1") {
                    echo 'admin';
                    header("Location: ../views/admin/admin.php");
                } else {
                    echo 'Unknown user type';
                }
                exit(); // Ensure script execution stops after redirection
            } else {
                // Invalid credentials, redirect back to login with error
                header("Location: index.php?page=login&error=InvalidCredentials");
                exit();
            }
        }
    }
}
