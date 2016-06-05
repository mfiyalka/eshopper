<?php

class UserController
{
    public function actionRegister()
    {

        $name       = '';
        $email      = '';
        $password   = '';
        $result     = '';

        if (isset($_POST['submit'])) {

            $name       = trim($_POST['name']);
            $email      = trim($_POST['email']);
            $password   = trim($_POST['password']);

            # У змінній $errors зберігатимемо помилки, якщо форма була не правильно заповнена
            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = "Ім'я повинно бути не менше 3-х символів";
            }

            if (!User::checkEmail($email)) {
                $errors[] = "Не правильний email";
            }

            if (!User::checkPassword($password)) {
                $errors[] = "Пароль повинен бути не менше 6-х символів";
            }

            if (User::checkEmailExists($email)) {
                $errors = null;
                $errors[] = "Такий email використовується";
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }

        }

        require_once ROOT . '/../app/views/user/register.php';

        return true;
    }

    public function actionLogin()
    {
        $email      = '';
        $password   = '';

        if (isset($_POST['submit'])) {

            $email      = trim($_POST['email']);
            $password   = trim($_POST['password']);

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = "Не правильний email";
            }

            if (!User::checkPassword($password)) {
                $errors[] = "Пароль повинен бути не менше 6-х символів";
            }

            // Перевіряємо, чи існує такий корситувач
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = "Не правильний логін/пароль";
            } else {
                // Сесія
                User::auth($userId);

                // Переадресовуємо користувача в кабінет
                header ('Location: /cabinet/');
            }
        }

        require_once ROOT . '/../app/views/user/login.php';

        return true;
    }


    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header ("Location: /");
    }
}