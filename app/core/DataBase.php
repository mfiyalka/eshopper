<?php

class DataBase
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/../app/config/config.php';
        $params = include ($paramsPath);

        $db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", $params['user'], $params['password']);
        $db->exec("set names utf8");

        return $db;
    }
}