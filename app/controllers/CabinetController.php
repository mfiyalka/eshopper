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
        $phone = $user['phone'];

        $result = false;

        if (isset($_POST['submit'])) {

            $name      = trim($_POST['name']);
            $phone      = trim($_POST['phone']);

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = "Ім'я повинно бути не менше 3-х символів";
            }

            if (!User::checkPhoneNumber($phone)) {
                $errors[] = "Не правильний телефон";
            }

            if ($errors == false) {
                $result = User::editUser($userId, $name, $phone);
            }

        }

        require_once (ROOT . '/../app/views/cabinet/edit.php');
        return true;
    }


    public function actionEditPassword()
    {
        // Отримуємо ідентифікатор користувача із сесії
        $userId = User::checkLogged();

        // Отримуємо інформацію про користувача із бази даних
        $user = User::getUserById($userId);

        $result = false;


        if (isset($_POST['submit'])) {

            $password = trim($_POST['password']);
            $password_repeat = trim($_POST['password_repeat']);

            $errors = false;

            if (!User::checkPassword($password)) {
                $errors[] = "Пароль повинен бути не менше 6 символів";
            }

            if ($password !== $password_repeat) {
                $errors[] = "Ви не вірно повторили пароль";
            }

            if ($errors == false) {
                $result = User::editUserPassword($userId, $password);
            }
        }

        require_once (ROOT . '/../app/views/cabinet/editpassword.php');
        return true;
    }

    public function actionHistory()
    {
        // Получаем список заказов
        $ordersList = Order::getOrdersList();

        require_once (ROOT . '/../app/views/cabinet/history.php');
        return true;
    }

    public function actionView($id)
    {
        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);

        // Рахуємо загальну вартість замовлення
        $totalPrice = 0;
        foreach ($products as $item) {
            $totalPrice = $totalPrice + $item['price'];
        }

        // Подключаем вид
        require_once(ROOT . '/../app/views/cabinet/view.php');
        return true;
    }
}