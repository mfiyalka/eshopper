<?php


class CatalogController
{
    public function actionIndex()
    {
        $categories = Category::getCategoryList();

        $brands = Category::getBrandsList();

        $latestProduct = Product::getLatestProduct(9);

        require_once (ROOT . '/../app/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = Category::getCategoryList();

        $brands = Category::getBrandsList();

        $categoryProduct = Product::getProductListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        // Створюємо об'єкт Pagination для посторінкової навігації
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT . '/../app/views/catalog/category.php');

        return true;
    }

    public function actionBrand($brandId, $page = 1)
    {
        $categories = Category::getCategoryList();
        $brands = Category::getBrandsList();

        $categoryProduct = Product::getProductsListByBrand($brandId, $page);

        $total = Product::getTotalProductsInBrand($brandId);

        // Створюємо об'єкт Pagination для посторінкової навігації
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT . '/../app/views/catalog/category.php');

        return true;


    }
}