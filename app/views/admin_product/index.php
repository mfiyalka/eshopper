<?php include ROOT . '/../app/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Адмінпанель</a></li>
                    <li class="active">Керування товарами</li>
                </ol>
            </div>

            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Додати товар</a>
            
            <h4>Перелік товарів</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID товару</th>
                    <th>Артикул</th>
                    <th>Назва товару</th>
                    <th>Ціна</th>
                    <th></th>
                    <th></th>
                </tr>
                <? foreach ($productsList as $product) { ?>
                    <tr>
                        <td><?=$product['id']?></td>
                        <td><?=$product['code']?></td>
                        <td><?=$product['name']?></td>
                        <td><?=$product['price']?></td>
                        <td><a href="/admin/product/update/<?=$product['id']?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/product/delete/<?=$product['id']?>" title="Видалити"><i class="fa fa-times"></i></a></td>
                    </tr>
                <? } ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/../app/views/layouts/footer_admin.php'; ?>