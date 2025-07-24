<?php 

// Настройки базы данных 
define('DB_HOST', 'database');
define('DB_USER', 'root');
define('DB_PASS', 'tiger');
define('DB_NAME', 'todo');

// Путь к проекту на сервере 
define('ROOT', dirname(__FILE__) . '/');

// Домен 
define('HOST', 'https://' . $_SERVER['HTTP_HOST'] . '/');

// Функции для отладки 

function p($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function pd($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die();
}