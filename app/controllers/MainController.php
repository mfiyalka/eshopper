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
//        echo '<pre>';
//        var_dump($sliderProducts);
        return true;
    }

    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;


        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            // Валідація email
            if (!User::checkEmail($userEmail)) {
                $errors[] = "Не правильний email";
            }

            // Перевірка, чи заповнене повідомлення
            if (!User::checkMessage($userText)) {
                $errors[] = "Введіть текст повідомлення (не менше 10 символів)";
            }

            if ($errors == false) {

                $adminEmail = 'mfiyalka@gmail.com';
                $message = "Текст: {$userText }. Від {$userEmail}";
                $subject = "Зворотній зв'язок";
//                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }

        }

        require_once (ROOT . '/../app/views/site/contact.php');
        return true;
    }
}