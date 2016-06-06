<?php

/**
 * Class User - модель для роботи з користувачами
 */

class User
{
    /**
     * Реєстрація нового користувача
     * @param string $name
     * @param string $email
     * @param string $password
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
    }

    /**
     * Перевіряє ім'я: не менше 3 символів
     * @param string $name
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
     * @param string $email
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
     * @param string $password
     * @return bool
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }

        return false;
    }

    /**
     * Перевіряє текст повідомлення: повинно бути не менше 10 символів
     * @param string $userText
     * @return bool
     */
    public static function checkMessage($userText)
    {
        if (strlen($userText) >= 10) {
            return true;
        }

        return false;
    }

    /**
     * Перевіряємо чи користувач з таким email є в базі даних
     * @param string $email
     * @return bool
     */
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

    /**
     * Перевірка чи зареєстрований користувач
     * @param string $email
     * @param string $password
     * @return bool
     */
    public static function checkUserData($email, $password)
    {
        $db = DataBase::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    /**
     * Запис id користувача в базу даних
     * @param integer $userId
     */
    public static function auth($userId)
    {

        $_SESSION['user'] = $userId;
    }

    /**
     * Перевіряємо чи є користувач в сесії, якщо так, то повертаємо його id,
     * якщо ні, то перенаправляємо на сторінку авторизації
     * @return mixed
     */
    public static function checkLogged()
    {

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }


    /**
     * Перевіряємо хто на сайті, авторизований користувач чи гість
     * @return bool
     */
    public static function isGuest()
    {

        if (isset($_SESSION['user'])) {
            return false;
        }

        return true;
    }

    /**
     * Отримання інформації про користувача
     * @param integer $userId
     * @return mixed
     */
    public static function getUserById($userId)
    {
        if ($userId) {

            $db = DataBase::getConnection();

            $sql = 'SELECT * FROM user WHERE id = :userId';

            $result = $db->prepare($sql);
            $result->bindParam(':userId', $userId, PDO::PARAM_STR);

            // Вказуємо, що хочемо отримати дані у вигляді масиву
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    /**
     * Оновлення даних користувача
     * @param integer $userId
     * @param string $name
     * @param string $password
     * @return bool
     */
    public static function edit($userId, $name, $password)
    {
        $db = DataBase::getConnection();

        $sql = 'UPDATE user SET name = :name, password = :password WHERE id = :userId';

        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }
}