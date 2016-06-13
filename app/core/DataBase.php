<?php

/**
 * Class DataBase
 * Підключення до бази даних
 */
class DataBase
{
    public static function getConnection()
    {
        // Шлях до файлу із налаштуваннями
        $paramsPath = ROOT . '/../app/config/config.php';
        $params = include($paramsPath);

        $db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", $params['user'], $params['password']);
        $db->exec("set names utf8");

        return $db;
    }
}
