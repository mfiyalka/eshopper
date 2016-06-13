<?php

/**
 * Контролер AdminOrderController
 * Керування замовленнями в адмінпанелі
 */
class AdminOrderController extends AdminBase
{

    /**
     * Action для сторінки "Керування замовленнями"
     */
    public function actionIndex()
    {
        // Перевіряємо права доступу
        self::checkAdmin();

        // Отримуємо перелік замовлень
        $ordersList = Order::getOrdersList();

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_order/index.php');
        return true;
    }

    /**
     * Action для сторінки "Редагуваня замовлення"
     */
    public function actionUpdate($id)
    {
        // Перевіряємо права доступу
        self::checkAdmin();

        // Отримуємо дані про конкретне замовлення
        $order = Order::getOrderById($id);

        // Опрацювання форми
        if (isset($_POST['submit'])) {
            // Якщо форма надіслана
            // Отримуємо дані із форми
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            // Зберігаємо зміни
            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

            // Перенаправляємо адміністратора на сторінку керування замовленнями
            header("Location: /admin/order/view/$id");
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_order/update.php');
        return true;
    }

    /**
     * Action для сторінки "Перегляд замовлення"
     */
    public function actionView($id)
    {
        // Перевіряємо права доступу
        self::checkAdmin();

        // Отримуємо дані про конкретне замовлення
        $order = Order::getOrderById($id);

        // Отримуємо масив з ідентифікаторами і кількістю товарів
        $productsQuantity = json_decode($order['products'], true);

        // Отримуємо масив з ідентифікаторами товарів
        $productsIds = array_keys($productsQuantity);

        // Отримуємо список товарів в замовленні
        $products = Product::getProductsByIds($productsIds);

        // Рахуємо загальну вартість замовлення
        $totalPrice = 0;
        foreach ($products as $item) {
            $totalPrice = $totalPrice + $item['price'];
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_order/view.php');
        return true;
    }

    /**
     * Action для сторінки "Видалити замовлення"
     */
    public function actionDelete($id)
    {
        // Перевіряємо права доступу
        self::checkAdmin();

        // Опрацювання форми
        if (isset($_POST['submit'])) {
            // Якщо форма надіслана
            // Видаляємо замовлення
            Order::deleteOrderById($id);

            // Перенаправляємо адміністратора на сторінку керування замовленнями
            header("Location: /admin/order");
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_order/delete.php');
        return true;
    }

}
