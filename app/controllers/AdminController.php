<?php
/**
 * Контролер AdminController
 */
class AdminController extends AdminBase
{
    /**
     * Action для сторінки Адміністрування
     */
    public function actionIndex()
    {
        // Перевірка доступу
        self::checkAdmin();

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin/index.php');
        return true;
    }
}