<?php


class MainController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(6);

        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        require_once (ROOT . '/../app/views/site/index.php');
        return true;
    }

    public function actionContact()
    {
        $userName       = '';
        $userEmail      = '';
        $userSubject    = '';
        $userMessage    = '';
        $result = false;


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
//                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }

        }

        require_once (ROOT . '/../app/views/site/contact.php');
        return true;
    }
}