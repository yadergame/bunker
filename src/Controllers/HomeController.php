<?php
namespace src\Controllers;

class HomeController {
    public function index() {
        echo "Home";
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        require str_replace("\Controllers","",__DIR__)."/Views/home.php";
    }
}
?>