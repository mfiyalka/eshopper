<?php

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        // Перевірка доступу
        self::checkAdmin();

        require_once (ROOT . '/../app/views/admin/index.php');
        return true;
    }
}