<?php include ROOT . '/../app/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br>
                        
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Адмінпанель</a></li>
                    <li class="active">Керування замовлення</li>
                </ol>
            </div>

            <h4>Перелік замовлення</h4>

            <br>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID замовлення</th>
                    <th>Ім'я покупця</th>
                    <th>Телефон покупця</th>
                    <th>Дата оформлення</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <? foreach ($ordersList as $order) { ?>
                    <tr>
                        <td>
                            <a href="/admin/order/view/<?=$order['id']?>">
                                <?=$order['id']?>
                            </a>
                        </td>
                        <td><?=$order['user_name']?></td>
                        <td><?=$order['user_phone']?></td>
                        <td><?=$order['date']?></td>
                        <td><?=Order::getStatusText($order['status'])?></td>
                        <td><a href="/admin/order/view/<?=$order['id']?>" title="Зберегти"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/admin/order/update/<?=$order['id']?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/order/delete/<?=$order['id']?>" title="Видалити"><i class="fa fa-times"></i></a></td>
                    </tr>
                <? } ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/../app/views/layouts/footer_admin.php'; ?>