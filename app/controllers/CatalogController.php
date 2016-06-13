<?php

/**
 * Контролер CatalogController
 */
class CatalogController
{
    /**
     * Action для сторінки "Каталог"
     */
    public function actionIndex()
    {
        // Отримуємо перелік категорій
        $categories = Category::getCategoryList();

        // Отримуємо перелік брендів
        $brands = Category::getBrandsList();

        // Отримуємо мінімальну та максимальну суми товарів
        $prices = Product::getMinMaxPrice();

        // Отримуємо перелік останній товарів
        $latestProduct = Product::getLatestProduct(9);

        // Підключаємо view
        require_once(ROOT . '/../app/views/catalog/index.php');
        return true;
    }

    /**
     * Action для Каталогу категорій
     */
    public function actionCategory($categoryId, $page = 1)
    {
        // Отримуємо перелік категорій
        $categories = Category::getCategoryList();

        // Отримуємо перелік брендів
        $brands = Category::getBrandsList();

        // Отримуємо мінімальну та максимальну суми товарів
        $prices = Product::getMinMaxPrice();

        // Отримуємо перелік товарів для вибраної категорії
        $categoryProduct = Product::getProductListByCategory($categoryId, $page);

        // Отримуємо кількість продуктів у вибраній категорії
        $total = Product::getTotalProductsInCategory($categoryId);

        // Створюємо об'єкт Pagination для посторінкової навігації
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Підключаємо view
        require_once(ROOT . '/../app/views/catalog/category.php');
        return true;
    }

    /**
     * Action для Каталогу брендів
     */
    public function actionBrand($brandId, $page = 1)
    {
        // Отримуємо перелік категорій
        $categories = Category::getCategoryList();

        // Отримуємо перелік брендів
        $brands = Category::getBrandsList();

        // Отримуємо мінімальну та максимальну суми товарів
        $prices = Product::getMinMaxPrice();

        // Отримуємо перелік товарів для вибраного бренду
        $categoryProduct = Product::getProductsListByBrand($brandId, $page);

        // Отримуємо кількість продуктів для вибраного бренду
        $total = Product::getTotalProductsInBrand($brandId);

        // Створюємо об'єкт Pagination для посторінкової навігації
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Підключаємо view
        require_once(ROOT . '/../app/views/catalog/category.php');
        return true;
    }
}
