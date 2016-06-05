<?php


class MainController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(6);

        require_once (ROOT . '/../app/views/site/index.php');
        return true;
    }


}