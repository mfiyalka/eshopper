<?php include ROOT . '/../app/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/order">Керування замовленнями</a></li>
                        <li class="active">Редагувати Редагувати</li>
                    </ol>
                </div>


                <h4>Редагувати Редагувати #<?= $id ?></h4>

                <br>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            <p>Ім'я клієнта</p>
                            <input type="text" name="userName" placeholder="" value="<?= $order['user_name'] ?>">

                            <p>Телефон клієнта</p>
                            <input type="text" name="userPhone" placeholder="" value="<?= $order['user_phone'] ?>">

                            <p>Коментар клієнта</p>
                            <input type="text" name="userComment" placeholder="" value="<?= $order['user_comment'] ?>">

                            <p>Дата оформлення замовлення</p>
                            <input type="text" name="date" placeholder="" value="<?= $order['date'] ?>">

                            <p>Статус</p>
                            <select name="status">
                                <option value="1" <? if ($order['status'] == 1) echo ' selected="selected"' ?>>Нове
                                    замовлення
                                </option>
                                <option value="2" <? if ($order['status'] == 2) echo ' selected="selected"' ?>>
                                    Опрацьовується
                                </option>
                                <option value="3" <? if ($order['status'] == 3) echo ' selected="selected"' ?>>
                                    Доставляється
                                </option>
                                <option value="4" <? if ($order['status'] == 4) echo ' selected="selected"' ?>>Закрите
                                </option>
                            </select>
                            <br>
                            <br>
                            <input type="submit" name="submit" class="btn btn-default" value="Зберегти">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <br>

<?php include ROOT . '/../app/views/layouts/footer_admin.php'; ?>