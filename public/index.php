<?php

// Виведення помилок
ini_set('display_errors', 1);
error_reporting(E_ALL);

// dirname — Возвращает имя родительского каталога из указанного пути
define('ROOT', dirname(__FILE__));

// Автозавантаження класів
require_once (ROOT . '/../app/core/Autoload.php');

$router = new Router();
$router->run();

