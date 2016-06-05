<?php


/**
 * @param $className
 */
function __autoload($className)
{
    # Перелік всіх директорій із класами
    $array_paths = [
        '/../app/models/',
        '/../app/core/'
    ];

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $className . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}