<?php

class Cart
{
    /**
     * Додаємо товар в кошик
     * @param integer $id
     */
    public static function addProduct($id)
    {
        $id = intval($id);

        // Створюємо пустий масив для товарів в кошику
        $productsInCart = array();

        // Якщо в кошику вже є товари (вони зерігаються в сесії)
        if (isset($_SESSION['products'])) {
            // то заповнюємо наш масив $productsInCart товарами
            $productsInCart = $_SESSION['products'];
        }

        // Якщо товар є в кошику, проте був знову доданий, то збільшуємо к-сть
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            // Додаємо новий товар в кошик
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    /**
     * Лічильник доданих товарів
     * @return int
     */
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    /**
     * Отримуємо id і кількість товарів, які є в кошику (із сесії)
     * @return bool
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    /**
     * Розрахунок суми замовлення
     * @param array $products
     * @return int
     */
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $totalPrice = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $totalPrice += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $totalPrice;

    }

    /**
     * Очищаємо кошик
     */
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    public static function deleteProduct($id)
    {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInCart = self::getProducts();

        // Удаляем из массива элемент с указанным id
        unset($productsInCart[$id]);

        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
    }
}