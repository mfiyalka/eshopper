<?php

class User
{
    /**
     * Реєстрація нового користувача
     * @param $name
     * @param $email
     * @param $password
     * @return bool
     */
    public static function register($name, $email, $password)
    {
        $db = DataBase::getConnection();

        $sql = 'INSERT INTO user (name, email, password)
                VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
        //todo: хешувати пароль md5
    }

    /**
     * Перевіряє ім'я: не менше 3 символів
     * @param $name
     * @return bool
     */
    public static function checkName($name)
    {
        if (strlen($name) > 3) {
            return true;
        }

        return false;
    }

    /**
     * Перевіряє чи валідний email
     * @param $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    /**
     * Перевіряє пароль: не менше 6 символів
     * @param $password
     * @return bool
     */
    public static function checkPassword($password)
    {
        if (strlen($password) > 6) {
            return true;
        }

        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = DataBase::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;

    }


}