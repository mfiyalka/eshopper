<?php


class ProductController
{
    public function actionView($productId)
    {
        $categories = Category::getCategoryList();
        $brands = Category::getBrandsList();

        $product = Product::getProductById($productId);

        require_once (ROOT . '/../app/views/product/view.php');
        return true;
    }
}