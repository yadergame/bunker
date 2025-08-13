<?php
return [
    'host' => 'localhost',
    'dbname' => 'bunker',
    'username' => 'asupb',
    'password' => '1234',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];
?>