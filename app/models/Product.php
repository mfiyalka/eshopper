<?php

class Product
{
    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = DataBase::getConnection();

        $productList = array();

        $result = $db->query('SELECT id, name, price, image, is_new
                                FROM product
                                WHERE status = 1
                                ORDER BY id DESC
                                LIMIT ' . $count);

        $productList = $result->fetchAll(PDO::FETCH_ASSOC);

        return $productList;
    }

    public static function getProductListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DataBase::getConnection();
            $products = array();

            $result = $db->query("SELECT id, name, price, image, is_new
                                FROM product
                                WHERE status = 1 AND category_id = $categoryId
                                ORDER BY id DESC
                                LIMIT " . self::SHOW_BY_DEFAULT
                                . " OFFSET " . $offset);

            @$products = $result->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        }
    }

    public static function getProductById($productId)
    {
        $db = DataBase::getConnection();

        $result = $db->query("SELECT * FROM product WHERE id = $productId");
        $product = $result->fetchAll(PDO::FETCH_ASSOC);

        return $product[0];

    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = DataBase::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM product WHERE status = 1 AND category_id = $categoryId");
        $count = $result->fetch(PDO::FETCH_ASSOC);

        return $count['count'];

    }

    public static function getProductsByIds($idsArray)
    {
        $products = array();

        $db = DataBase::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT id, code, name, price FROM product WHERE status = 1 AND id IN ($idsString)";
        $result = $db->query($sql);
        $products = $result->fetchAll(PDO::FETCH_ASSOC);

        return $products;


    }
}