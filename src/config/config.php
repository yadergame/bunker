<?php
// Настройки безопасности
define('APP_SECRET', 'your_strong_secret_here');
define('CSRF_TOKEN_EXPIRY', 3600); // 1 час

// Настройки сессии
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true, // Для HTTPS
    'use_strict_mode' => true
]);

// Автозагрузчик классов
spl_autoload_register(function ($class) {
    require str_replace('\\', '/', $class) . '.php';
});
?>  