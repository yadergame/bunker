<?php
namespace App\Controllers;

class HomeController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        require '../views/home.php';
    }
}
?>