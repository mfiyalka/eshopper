<?php

class CartController
{
    // Синхронний метод для додавання товарів в кошик
    public function actionAdd($id)
    {
        // Додаємо товар в кошик
        Cart::addProduct($id);

        // Повертаємо користувача на сторінку
        $referer = $_SERVER['HTTP_REFERER'];
        header ("Location: $referer");
    }

    // Асинхронний метод для додавання товарів в кошик
    public function actionAddAjax($id)
    {
        // Додаємо товар в кошик
        echo Cart::addProduct($id);
        return true;
    }

    public function actionDelete($id)
    {

        header("Locatuon: /cart/");
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        // Отримуємо дані із кошика
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Отримуємо повну інформацію про товари із переліку
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            // Отримуємо загальну вартість (суму) товарів
            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once (ROOT . '/../app/views/cart/index.php');
        return true;
    }

    public function actionCheckout()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        // Статус успішного оформлення замовлення
        $result = false;

        // Форма відправлена?
        if (isset($_POST['submit'])) {
            // Форма відправлена? - Так

            // Отримуємо дані із форми
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            // Валідація полів
            $errors = false;
            if(!User::checkName($userName))
                $errors[] = "Не правильне ім'я";
            if(!User::checkPhone($userPhone))
                $errors[] = "Не правильний телефон";

            // Форма заповнена коректно?
            if ($errors == false) {
                // Форма заповнена коректно? - Так
                // Зберігаємо замовлення в базі даних

                // Збираємо інформацію про замовлення
                $productsInCard = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }

                // Зберігаємо замовлення в базі даних
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCard);

                if ($result) {
                    // Відправляємо адміністратору повідомлення про замовлення
                    $adminEmail = 'mfiyalka@gmail.com';
                    $subject = "";
                    $message = "";
//                    mail($adminEmail, $subject, $message);

                    // Очищаємо кошик
                    Cart::clear();
                }
            } else {
                // Форма заповнена коректно? - Ні

                // Підсумки: загальна вартість, кількість товарів
                $productsInCard = Cart::getProducts();
                $productsIds = array_keys($productsInCard);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        } else {
            // Форма відправлена? - Ні

            // Отримання даних із кошика
            $productsInCard = Cart::getProducts();

            // В кошику є товари?
            if ($productsInCard == false) {
                // В кошику є товари? - Ні
                // Відправляємо клієнта на головну вибирати товари
                header("Location: /");
            } else {
                // В кошику є товари? - Так

                // Підсумки: загальна вартість, кількість товарів
                $productsIds = array_keys($productsInCard);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;

                // Користувач авторизований?
                if (User::isGuest()) {
                    // Користувач авторизований? - Ні
                    // Значення для форми пусті
                } else {
                    // Користувач авторизований? - Так
                    // Отримуємо інформацію про користувача із бази даних за id
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);

                    // Підставляємо значення у форму
                    $userName = $user['name'];
                }
            }
        }

        require_once (ROOT . '/../app/views/cart/checkout.php');
        return true;
    }

}