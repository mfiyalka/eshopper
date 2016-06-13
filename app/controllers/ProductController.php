<?php

/**
 * Контролер ProductController
 */
class ProductController
{
    /**
     * Action для сторінки Продукту
     */
    public function actionView($productId)
    {
        // Отримуємо перелік категорій
        $categories = Category::getCategoryList();

        // Отримуємо перелік брендів
        $brands = Category::getBrandsList();

        // Отримуємо мінімальну та максимальну суми товарів
        $prices = Product::getMinMaxPrice();

        // Отримуємо деталі вибраного продукту
        $product = Product::getProductById($productId);

        // Підключаємо view
        require_once(ROOT . '/../app/views/product/view.php');
        return true;
    }
}
