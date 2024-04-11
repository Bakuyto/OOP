<?php

require_once('../app/controllers/LoginController.php');
require_once('../app/controllers/AdminController.php');
// require_once('../app/controllers/UserController.php');

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'login';
}

switch($page) {
    case 'login':
        $loginController = new LoginController();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $loginController->processLogin();
            } catch (Exception $e) {
                // Handle the exception, for example, redirecting to an error page
                header("Location: error.php?message=" . urlencode($e->getMessage()));
                exit();
            }
        } else {
            $loginController->showLoginForm();
        }
        break;
    default:
        // Redirect to login page or handle error
        header("Location: index.php?page=login");
        exit();
}
