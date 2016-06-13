<?php

/**
 * Функція для автозавантаження класів
 * @param $className
 */
function __autoload($className)
{
    // Масив з переліком всіх директорій із класами
    $array_paths = [
        '/../app/models/',
        '/../app/core/'
    ];

    // Перебираємо масив із директоріями
    foreach ($array_paths as $path) {

        // Формуємо шлях до файлу
        $path = ROOT . $path . $className . '.php';

        // Якщо такий файл є, то підключаємо його
        if (is_file($path)) {
            include_once $path;
        }
    }
}
