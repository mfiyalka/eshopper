<?php


class ProductController
{
    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $product = Product::getProductById($productId);

        require_once (ROOT . '/../app/views/product/view.php');
        return true;
    }
}