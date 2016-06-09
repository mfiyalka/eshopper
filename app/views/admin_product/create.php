<?php include ROOT . '/../app/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/product">Керування товарами</a></li>
                        <li class="active">Додати товар</li>
                    </ol>
                </div>


                <h4>Додати новий товар</h4>

                <br/>

                <? if (isset($errors) && is_array($errors)) { ?>
                    <ul>
                        <? foreach ($errors as $error) { ?>
                            <li> - <?= $error ?></li>
                        <? } ?>
                    </ul>
                <? } ?>

                <div class="col-md-6">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">

                            <p>Назва товару</p>
                            <input type="text" name="name" placeholder="" value="">

                            <p>Артикул</p>
                            <input type="text" name="code" placeholder="" value="">

                            <p>Вартість, грн</p>
                            <input type="text" name="price" placeholder="" value="">

                            <p>Категорія</p>
                            <select name="category_id">
                                <? if (is_array($categoriesList)) { ?>
                                    <? foreach ($categoriesList as $category) { ?>
                                        <option value="<? $category['id'] ?>">
                                            <?= $category['name'] ?>
                                        </option>
                                    <? } ?>
                                <? } ?>
                            </select>

                            <br/><br/>

                            <p>Виробник</p>
                            <input type="text" name="brand" placeholder="" value="">

                            <p>Зображення товару</p>
                            <input type="file" name="image" placeholder="" value="">

                            <p>Детальний опис товару</p>
                            <textarea name="description" id="description" rows="8"></textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'description' );
                            </script>
                            <br/><br/>

                            <p>Наявність на складі</p>
                            <select name="availability">
                                <option value="1" selected="selected">Так</option>
                                <option value="0">Ні</option>
                            </select>

                            <br/><br/>

                            <p>Новинка</p>
                            <select name="is_new">
                                <option value="1" selected="selected">Так</option>
                                <option value="0">Ні</option>
                            </select>

                            <br/><br/>

                            <p>Рекомендований</p>
                            <select name="is_recommended">
                                <option value="1" selected="selected">Так</option>
                                <option value="0">Ні</option>
                            </select>

                            <br/><br/>

                            <p>Статус</p>
                            <select name="status">
                                <option value="1" selected="selected">Відображається</option>
                                <option value="0">Прихований</option>
                            </select>

                            <br/><br/>

                            <input type="submit" name="submit" class="btn btn-default" value="Зберегти">

                            <br/><br/>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include ROOT . '/../app/views/layouts/footer_admin.php'; ?>