<?php
require '../app/config/config.php';

// Маршрутизация
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '/home':
        $controller = new App\Controllers\HomeController();
        $controller->index();
        break;
    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new App\Controllers\AuthController();
            $controller->login();
        } else {
            require '../app/views/auth/login.php';
        }
        break;
    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new App\Controllers\AuthController();
            $controller->register();
        } else {
            require '../app/views/auth/register.php';
        }
        break;
    case '/logout':
        $controller = new App\Controllers\AuthController();
        $controller->logout();
        break;
    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}
?>