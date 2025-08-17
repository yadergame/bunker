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
    // Преобразуем namespace в путь к файлу
    $file = str_replace("src\config","",__DIR__). str_replace('\\', '/', $class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    } else {
        // Выводим отладочную информацию
        die("Автозагрузка: файл не найден - " . $file . 
            "<br>Проверьте:<br>" .
            "1. Существует ли файл<br>" .
            "2. Совпадает ли регистр букв<br>" .
            "3. Правильно ли указан namespace в классе");
    }
});
?>  