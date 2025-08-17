<?php
namespace src\Controllers;

class HomeController {
    public function index() {
        echo "Home";
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        require '../views/home.php';
    }
}
?>