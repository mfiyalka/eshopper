<?php

/**
 * Контролер AdminCategoryController
 * Керування категоріями товарів в адмін панелі
 */
class AdminCategoryController extends AdminBase
{

    /**
     * Action для сторінки "Керування категоріями"
     */
    public function actionIndex()
    {
        // Перевірка доступу
        self::checkAdmin();

        // Отримуємо перелік категорій
        $categoriesList = Category::getCategoriesListAdmin();

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_category/index.php');
        return true;
    }

    /**
     * Action для сторінки "Додати категорію"
     */
    public function actionCreate()
    {
        // Перевірка доступу
        self::checkAdmin();

        // Опрацювання форми
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            $errors = false;

            // Перевіряємо чи заповнені поля
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заповніть поля';
            }

            if ($errors == false) {
                // Якщо помилок немає, то додаємо нову категорію
                Category::createCategory($name, $sortOrder, $status);

                // Перенаправляємо адміністратора на сторінку керування категоріями
                header("Location: /admin/category");
            }
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_category/create.php');
        return true;
    }

    /**
     * Action для сторінки "Редагувати категорію"
     */
    public function actionUpdate($id)
    {
        // Перевірка доступу
        self::checkAdmin();

        // Отримуємо дані про конкретну категорію
        $category = Category::getCategoryById($id);

        // Опрацювання форми
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Зберігаємо зміни
            Category::updateCategoryById($id, $name, $sortOrder, $status);

            // Перенаправляємо адміністратора на сторінку керування категоріями
            header("Location: /admin/category");
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_category/update.php');
        return true;
    }

    /**
     * Action для сторінки "Видалити категорію"
     */
    public function actionDelete($id)
    {
        // Перевірка доступу
        self::checkAdmin();

        // Опрацювння форми
        if (isset($_POST['submit'])) {

            // Видаляємо категорію
            Category::deleteCategoryById($id);

            // Перенаправляємо адміністратора на сторінку керування категоріями
            header("Location: /admin/category");
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_category/delete.php');
        return true;
    }
}