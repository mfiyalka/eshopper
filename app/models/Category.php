<?php

/**
 * Class Category
 * Модель для роботи з категоріями
 */
class Category
{
    /**
     * Return an array of categories
     * @return array
     */
    public static function getCategoryList()
    {
        $db = DataBase::getConnection();

        $categoryList = array();
        $result = $db->query('SELECT id, name FROM category ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id']     = $row['id'];
            $categoryList[$i]['name']   = $row['name'];
            $i++;
        }

        return $categoryList;
    }

    /**
     * Return an array of brands
     * @return array
     */
    public static function getBrandsList()
    {
        $db = DataBase::getConnection();

        $brandsList = array();
        $result = $db->query('SELECT t1.id, t1.name, count(t2.brand_id) AS count FROM brands AS t1 JOIN product AS t2 ON t1.id = t2.brand_id GROUP BY t1.name');

        return $result->fetchALL(PDO::FETCH_ASSOC);
    }

    /**
     * Повертає масив категорій для списку в адмін панелі
     * @return array
     */
    public static function getCategoriesListAdmin()
    {
        $db = DataBase::getConnection();

        $result = $db->query('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC');

        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Повертає масив брендів для списку в адмін панелі
     * @return array
     */
    public static function getBrandsListAdmin()
    {
        $db = DataBase::getConnection();

        $result = $db->query('SELECT id, name FROM brands ORDER BY name ASC');

        $brandsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $brandsList[$i]['id'] = $row['id'];
            $brandsList[$i]['name'] = $row['name'];
            $i++;
        }
        return $brandsList;
    }

    /**
     * Видаляє категорію із вказаним id
     * @param integer $id
     * @return boolean
     */
    public static function deleteCategoryById($id)
    {
        $db = DataBase::getConnection();

        $sql = 'DELETE FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редагування категорії із вказаним id
     * @param integer $id
     * @param string $name
     * @param integer $sortOrder
     * @param integer $status
     * @return boolean
     */
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $db = DataBase::getConnection();

        $sql = "UPDATE category
            SET
                name = :name,
                sort_order = :sort_order,
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Повертає категорію із вказаним id
     * @param integer $id
     * @return array
     */
    public static function getCategoryById($id)
    {
        $db = DataBase::getConnection();

        $sql = 'SELECT * FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    /**
     * Повертає текстове пояснення статусу для категорії
     * @param $status
     * @return string
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Відображається';
                break;
            case '0':
                return 'Прихована';
                break;
        }
    }

    /**
     * Додає нову категорію
     * @param $name
     * @param $sortOrder
     * @param $status
     * @return bool
     */
    public static function createCategory($name, $sortOrder, $status)
    {
        $db = DataBase::getConnection();

        $sql = 'INSERT INTO category (name, sort_order, status) '
            . 'VALUES (:name, :sort_order, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}
