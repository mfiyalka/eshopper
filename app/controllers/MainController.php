<?php

/**
 * Контролер MainController
 * Головна сторінка та Зворотній зв'язок
 */
class MainController
{
    /**
     * Action для сторінки "Головна"
     */
    public function actionIndex()
    {
        // Отримуємо перелік категорій
        $categories = Category::getCategoryList();

        // Отримуємо перелік брендів
        $brands = Category::getBrandsList();

        // Отримуємо перелік останній товарів
        $latestProduct = Product::getLatestProduct(6);

        // Отримуємо мінімальну та максимальну суми товарів
        $prices = Product::getMinMaxPrice();

        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        // Підключаємо view
        require_once(ROOT . '/../app/views/site/index.php');
        return true;
    }

    /**
     * Action для сторінки "Контакти"
     */
    public function actionContact()
    {
        $userName       = '';
        $userEmail      = '';
        $userSubject    = '';
        $userMessage    = '';
        $result         = false;

        if (isset($_POST['submit'])) {
            $userName       = $_POST['name'];
            $userEmail      = $_POST['email'];
            $userSubject    = $_POST['subject'];
            $userMessage    = $_POST['message'];

            $errors = false;

            // Валідація email
            if (!User::checkEmail($userEmail)) {
                $errors[] = "Не правильний email";
            }

            // Перевірка, чи заповнене повідомлення
            if (!User::checkMessage($userMessage)) {
                $errors[] = "Введіть текст повідомлення (не менше 10 символів)";
            }

            if ($errors == false) {
                $adminEmail = 'mfiyalka@gmail.com';
                $message = "Текст: {$userMessage }. Від {$userEmail}, {$userName}";
                $subject = $userSubject;
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/site/contact.php');
        return true;
    }
}
