<?php include ROOT . '/../app/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/product">Керування товарами</a></li>
                        <li class="active">Видалити товар</li>
                    </ol>
                </div>


                <h4>Видалити товар #<?= $id ?></h4>


                <p>Ви дійсно хочете видалити цей товар?</p>

                <form method="post">
                    <input type="submit" name="submit" value="Видалити"/>
                </form>

            </div>
        </div>
    </section>
    <br>
    <br>

<?php include ROOT . '/../app/views/layouts/footer_admin.php'; ?>