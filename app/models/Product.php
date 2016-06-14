<?php

/**
 * Class Product
 * Модель для роботи з продуктами
 */
class Product
{
    // Кількість товарів, які відображаються за замовчуванням
    const SHOW_BY_DEFAULT = 6;

    /**
     * Отримання переліку останніх товарів
     * @param int $count
     * @return array
     */
    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = DataBase::getConnection();

        $result = $db->query('SELECT id, name, price, image, is_new
                                FROM product
                                WHERE status = 1
                                ORDER BY id DESC
                                LIMIT ' . $count);

        $productList = $result->fetchAll(PDO::FETCH_ASSOC);

        return $productList;
    }

    /**
     * Отримання переліку товарів вибраної категорії
     * @param int $categoryId
     * @param int $page
     * @return array
     */
    public static function getProductListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DataBase::getConnection();

            $result = $db->query("SELECT id, name, price, image, is_new
                                FROM product
                                WHERE status = 1 AND category_id = $categoryId
                                ORDER BY id DESC
                                LIMIT " . self::SHOW_BY_DEFAULT
                                . " OFFSET " . $offset);

            $products = $result->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        }
    }

    /**
     * Отримання переліку товарів вибраного бренду
     * @param int $brandId
     * @param int $page
     * @return array
     */
    public static function getProductsListByBrand($brandId = false, $page = 1)
    {
        if ($brandId) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DataBase::getConnection();

            $result = $db->query("SELECT id, name, price, image, is_new
                                FROM product
                                WHERE status = 1 AND brand_id = $brandId
                                ORDER BY id DESC
                                LIMIT " . self::SHOW_BY_DEFAULT
                                . " OFFSET " . $offset);

            $products = $result->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        }
    }

    // todo написати метод для повернення продуктів за діапазоном цін
    public static function getProductsListByPrice($min, $max)
    {
        return true;
    }

    /**
     * Отримання мінімальної та максимальної сум товарів
     * @return array
     */
    public static function getMinMaxPrice()
    {
        $db = DataBase::getConnection();
        $sql = "SELECT min(price) AS min_price, max(price) AS max_price FROM product";
        $result = $db->query($sql);
        $prices = $result->fetchAll(PDO::FETCH_ASSOC);

        return $prices[0];
    }

    /**
     * Отримання переліку деталей товару
     * @param $productId
     * @return array
     */
    public static function getProductById($productId)
    {
        $db = DataBase::getConnection();

        $result = $db->query("SELECT t1.*, t2.name AS brand FROM product AS t1 JOIN brands AS t2 ON t1.brand_id = t2.id WHERE t1.id = $productId");
        $product = $result->fetchAll(PDO::FETCH_ASSOC);

        return $product[0];
    }

    /**
     * Отримання кількості товарів у вибраній категорії
     * @param $categoryId
     * @return int
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = DataBase::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM product WHERE status = 1 AND category_id = $categoryId");
        $count = $result->fetch(PDO::FETCH_ASSOC);

        return $count['count'];
    }

    /**
     * Отримання кількості товарів для вибраного бренду
     * @param $brandId
     * @return int
     */
    public static function getTotalProductsInBrand($brandId)
    {
        $db = DataBase::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM product WHERE status = 1 AND brand_id = $brandId");
        $count = $result->fetch(PDO::FETCH_ASSOC);

        return $count['count'];
    }

    /**
     * Отримання деталей товарів
     * @param $idsArray Масив з id товарами
     * @return array
     */
    public static function getProductsByIds($idsArray)
    {
        $db = DataBase::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT id, code, name, price FROM product WHERE status = 1 AND id IN ($idsString)";
        $result = $db->query($sql);
        $products = $result->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Перелік рекомендованих товарів
     * @return array
     */
    public static function getRecommendedProducts()
    {
        $db = DataBase::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, is_new FROM product '
            . 'WHERE status = "1" AND is_recommended = "1" '
            . 'ORDER BY id DESC');
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    /**
     * Отримання переліку всіх товарів для адмінки
     * @return array
     */
    public static function getProductsList()
    {
        $db = DataBase::getConnection();

        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Видалення товару
     * @param $id
     * @return bool
     */
    public static function deleteProductById($id)
    {
        $db = DataBase::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    /**
     * Метод для додавання нового продукту
     * @param $options
     * @return int|string
     */
    public static function createProduct($options)
    {
        $db = DataBase::getConnection();

        $sql = 'INSERT INTO product '
            . '(name, code, price, category_id, brand_id, availability,'
            . 'description, is_new, is_recommended, status)'
            . 'VALUES '
            . '(:name, :code, :price, :category_id, :brand_id, :availability,'
            . ':description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand_id', $options['brand_id'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Якщо запит виконаний успішно, то повертаємо id додатого запису
            return $db->lastInsertId();
        }
        // Інакше повертаємо 0
        return 0;
    }

    /**
     * Метод для редагування продукту
     * @param $id
     * @param $options
     * @return bool
     */
    public static function updateProductById($id, $options)
    {
        $db = DataBase::getConnection();

        $sql = "UPDATE product
            SET
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                brand_id = :brand_id,
                availability = :availability,
                description = :description,
                is_new = :is_new,
                is_recommended = :is_recommended,
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand_id', $options['brand_id'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }

    /**
     * Метод, який повертає статуси наявності товарів (для адмінки)
     * @param integer $availability
     * @return string Текстове пояснення
     */
    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наявності';
                break;
            case '0':
                return 'Під замовлення';
                break;
        }
    }

    /**
     * Отримання шляху до зображення
     * @param integer $id
     * @return string Шлях до зображення
     */
    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';

        $path = '/public/upload/images/products/';

        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }

        return $path . $noImage;
    }
}
