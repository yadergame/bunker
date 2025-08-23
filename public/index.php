<?php
require '../src/config/config.php';

// Маршрутизация
$request = $_SERVER['REQUEST_URI'];

switch (str_replace("/public","",$request)) {
    case '/':
    case '/home':
        $controller = new src\Controllers\HomeController();
        $controller->index();
        break;
    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new src\Controllers\AuthController();
            $controller->login();
        } else {
            require '../src/Views/auth/login.php';
        }
        break;
    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new src\Controllers\AuthController();
            $controller->register();
        } else {
            require '../src/views/auth/register.php';
        }
        break;
    case '/logout':
        $controller = new src\Controllers\AuthController();
        $controller->logout();
        break;
    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}
?>