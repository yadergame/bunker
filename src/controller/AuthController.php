<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Database;

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        $this->validateCsrfToken();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByUsername($username);

        if ($user && $this->userModel->verifyPassword($user, $password)) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: /home');
            exit;
        }

        // Обработка ошибки
        $_SESSION['error'] = 'Invalid credentials';
        header('Location: /login');
        exit;
    }

    public function register() {
        $this->validateCsrfToken();

        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Валидация
        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match';
            header('Location: /register');
            exit;
        }

        if ($this->userModel->findByUsername($username)) {
            $_SESSION['error'] = 'Username already exists';
            header('Location: /register');
            exit;
        }

        if ($this->userModel->create($username, $email, $password)) {
            $_SESSION['success'] = 'Registration successful!';
            header('Location: /login');
            exit;
        }

        $_SESSION['error'] = 'Registration failed';
        header('Location: /register');
        exit;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }

    private function validateCsrfToken() {
        $token = $_POST['csrf_token'] ?? '';
        if (!$this->isCsrfTokenValid($token)) {
            die('CSRF token validation failed');
        }
    }

    public function generateCsrfToken() {
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        $_SESSION['csrf_token_expiry'] = time() + CSRF_TOKEN_EXPIRY;
        return $token;
    }

    private function isCsrfTokenValid($token) {
        if (!isset($_SESSION['csrf_token'], $_SESSION['csrf_token_expiry'])) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $token) && time() < $_SESSION['csrf_token_expiry'];
    }
}
?>