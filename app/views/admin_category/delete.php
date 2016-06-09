<?php include ROOT . '/../app/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <br>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/category">Керування категоріями</a></li>
                        <li class="active">Видалити категорію</li>
                    </ol>
                </div>
                <h4>Видалити категорію #<?= $id ?></h4>
                <p>Ви дійсно хочете видалити цю категорію?</p>
                <form method="post">
                    <input type="submit" name="submit" value="Видалити"/>
                </form>
            </div>
        </div>
    </section>
    <br>
    <br>

<?php include ROOT . '/../app/views/layouts/footer_admin.php'; ?>