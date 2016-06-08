<?php

class CabinetController
{
    public function actionIndex()
    {
        // Отримуємо ідентифікатор користувача із сесії
        $userId = User::checkLogged();

        // Отримуємо інформацію про користувача із бази даних
        $user = User::getUserById($userId);

        require_once (ROOT . '/../app/views/cabinet/index.php');

        return true;
    }

    public function actionEdit()
    {
        // Отримуємо ідентифікатор користувача із сесії
        $userId = User::checkLogged();

        // Отримуємо інформацію про користувача із бази даних
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {

            $name      = trim($_POST['name']);
            $password   = trim($_POST['password']);

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = "Ім'я повинно бути не менше 3-х символів";
            }

            if (!User::checkPassword($password)) {
                $errors[] = "Пароль повинен бути не менше 6-х символів";
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }

        }

        require_once (ROOT . '/../app/views/cabinet/edit.php');
        return true;
    }
}