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

}