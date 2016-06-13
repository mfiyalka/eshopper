<?php

/**
 * Class Order
 * Модель для роботи із замовленнями
 */
class Order
{
    /**
     * Метод для додавання замовлення в базу даних
     * @param string $userName
     * @param string $userPhone
     * @param string $userComment
     * @param string $userCity
     * @param integer $userId
     * @param string $products
     */
    public static function save($userName, $userPhone, $userComment, $userCity, $userId, $products)
    {
        $db = DataBase::getConnection();

        $sql = "INSERT INTO product_order (user_name, user_phone, user_comment, user_city, user_id, products)
                  VALUES (:user_name, :user_phone, :user_comment, :user_city, :user_id, :products)";

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_city', $userCity, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Повертає перелік замовлень
     * @return array
     */
    public static function getOrdersList()
    {
        $db = DataBase::getConnection();

        $result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    /**
     * Повертає текстове пояснення статусу для замовлення:<br/>
     * <i>1 - Нове замовлення, 2 - В опрацюванні, 3 - Доставляється, 4 - Закрите</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстове пояснення</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Нове замовлення';
                break;
            case '2':
                return 'В опрацюванні';
                break;
            case '3':
                return 'Доставляється';
                break;
            case '4':
                return 'Закрите';
                break;
        }
    }

    /**
     * Повертає замовлення із зазначеним id
     * @param integer $id
     * @return array
     */
    public static function getOrderById($id)
    {
        $db = DataBase::getConnection();

        $sql = 'SELECT * FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    /**
     * Видаляє замовлення з заданим id
     * @param integer $id
     * @return boolean
     */
    public static function deleteOrderById($id)
    {
        $db = DataBase::getConnection();

        $sql = 'DELETE FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редагує замовлення із заданим id
     * @param $id
     * @param $userName
     * @param $userPhone
     * @param $userComment
     * @param $date
     * @param $status
     * @return bool
     */
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        $db = DataBase::getConnection();

        $sql = "UPDATE product_order
            SET
                user_name = :user_name,
                user_phone = :user_phone,
                user_comment = :user_comment,
                date = :date,
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}
