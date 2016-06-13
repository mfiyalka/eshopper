<?php

/**
 * Контролер AdminProductController
 */
class AdminProductController extends AdminBase
{

    /**
     * Виведення переліку товарів
     * @return bool
     */
    public function actionIndex()
    {
        // Перевірка прав доступу
        self::checkAdmin();

        // Отримуємо перелік товарів
        $productsList = Product::getProductsList();

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_product/index.php');
        return true;
    }

    /**
     * Видалення товару
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Перевірка прав доступу
        self::checkAdmin();

        // Опрацювання форми
        if (isset($_POST['submit'])) {

            // Видаляємо товар
            Product::deleteProductById($id);

            // Перенаправляємо адміністратора на сторінку керування товарами
            header("Location: /admin/product");
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_product/delete.php');
        return true;
    }

    /**
     * @return bool
     */
    public function actionCreate()
    {
        // Перевірка прав доступу
        self::checkAdmin();

        // Отримуємо перелік категорій для списку
        $categoriesList = Category::getCategoriesListAdmin();

        // Отримуємо перелік брендів для списку
        $brandsList = Category::getBrandsListAdmin();


        // Опрацювання форми
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand_id'] = $_POST['brand_id'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            // Прапор помилок у формі
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Якщо помилок немає
                // Додаємо новий товар
                $id = Product::createProduct($options);

                // Якщо запис доданий
                if ($id) {
                    // Перевіримо, чи завантажувалося через форму зображення
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                        // Якщо завантажувалося, то переміщаємо його в потрібну папку та перейменовуємо
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };

                // Перенаправляємо адміністратора на сторінку керування товарами
                header("Location: /admin/product");
            }
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_product/create.php');
        return true;
    }

    /**
     * Action для сторінки "Редагування товару"
     */
    public function actionUpdate($id)
    {
        // Перевірка прав доступу
        self::checkAdmin();

        // Отримуємо перелік категорій для списку
        $categoriesList = Category::getCategoriesListAdmin();

        // Отримуємо перелік брендів для списку
        $brandsList = Category::getBrandsListAdmin();

        // Отримуємо дані для конкретного замовлення
        $product = Product::getProductById($id);

        // Опрацювання форми
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand_id'] = $_POST['brand_id'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            // Зберігаємо зміни
            if (Product::updateProductById($id, $options)) {

                // Якщо запис доданий
                // Перевіримо, чи завантажувалося через форму зображення
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Якщо завантажувалося, то переміщаємо його в потрібну папку та перейменовуємо
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }
            }

            // Перенаправляємо адміністратора на сторінку керування товарами
            header("Location: /admin/product");
        }

        // Підключаємо view
        require_once(ROOT . '/../app/views/admin_product/update.php');
        return true;
    }
}
