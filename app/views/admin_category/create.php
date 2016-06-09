<?php include ROOT . '/../app/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/order">Керування категоріями</a></li>
                        <li class="active">Додати категорію</li>
                    </ol>
                </div>
                <h4>Додати нову категорію</h4>
                <br/>
                <? if (isset($errors) && is_array($errors)) { ?>
                    <ul>
                        <? foreach ($errors as $error) { ?>
                            <li> <?=$error; ?></li>
                        <? } ?>
                    </ul>
                <? } ?>
                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">
                            <p>Назва</p>
                            <input type="text" name="name" placeholder="" value="">
                            <p>Порядковий номер</p>
                            <input type="text" name="sort_order" placeholder="" value="">
                            <p>Статус</p>
                            <select name="status">
                                <option value="1" selected="selected">Відображається</option>
                                <option value="0">Прихована</option>
                            </select>
                            <br><br>
                            <input type="submit" name="submit" class="btn btn-default" value="Зберегти">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/../app/views/layouts/footer_admin.php'; ?>