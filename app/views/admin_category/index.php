<?php include ROOT . '/../app/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Адмінпанель</a></li>
                    <li class="active">Керування категоріями</li>
                </ol>
            </div>

            <a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i> Додати категорію</a>
            
            <h4>Перелік категорій</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID категорії</th>
                    <th>Назва категорії</th>
                    <th>Порядковий номер</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <? foreach ($categoriesList as $category) { ?>
                    <tr>
                        <td><?=$category['id']?></td>
                        <td><?=$category['name']?></td>
                        <td><?=$category['sort_order']?></td>
                        <td><?=Category::getStatusText($category['status'])?></td>
                        <td><a href="/admin/category/update/<?=$category['id']?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/category/delete/<?=$category['id']?>" title="Видалити"><i class="fa fa-times"></i></a></td>
                    </tr>
                <? } ?>
            </table>
        </div>
    </div>
</section>

<?php include ROOT . '/../app/views/layouts/footer_admin.php'; ?>

