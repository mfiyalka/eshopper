<?php include ROOT . '/../app/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/cabinet">Особистий кабінет</a></li>
                        <li><a href="/cabinet/history">Історія замовлень</a></li>
                        <li class="active">Перегляд замовлення</li>
                    </ol>
                </div>


                <h4>Перегляд замовлення #<?=$order['id']?></h4>
                <br>

                <h5>Інформація про замовлення</h5>
                <table class="table-admin-small table-bordered table-striped table">
                    <tr>
                        <td>Номер замовлення</td>
                        <td><?=$order['id']?></td>
                    </tr>
                    <tr>
                        <td>Ім'я клієнта</td>
                        <td><?=$order['user_name']?></td>
                    </tr>
                    <tr>
                        <td>Телефон клієнта</td>
                        <td><?=$order['user_phone']?></td>
                    </tr>
                    <tr>
                        <td>Місто доставки</td>
                        <td><?=$order['user_city']?></td>
                    </tr>
                    <tr>
                        <td>Коментар клієнта</td>
                        <td><?=$order['user_comment']?></td>
                    </tr>
                    <? if ($order['user_id'] != 0) { ?>
                        <tr>
                            <td>ID клієнта</td>
                            <td><?=$order['user_id']?></td>
                        </tr>
                    <? } ?>
                    <tr>
                        <td><b>Статус замовлення</b></td>
                        <td><?=Order::getStatusText($order['status'])?></td>
                    </tr>
                    <tr>
                        <td><b>Дата замовлення</b></td>
                        <td><?=$order['date']?></td>
                    </tr>
                </table>

                <h5>Товари в замовленні</h5>

                <table class="table-admin-medium table-bordered table-striped table ">
                    <tr>
                        <th>ID товару</th>
                        <th>Артикул товару</th>
                        <th>Назва</th>
                        <th>Ціна</th>
                        <th>Кількість</th>
                    </tr>
                    <? foreach ($products as $product) { ?>
                        <tr>
                            <td><?=$product['id']?></td>
                            <td><?=$product['code']?></td>
                            <td><?=$product['name']?></td>
                            <td><?=$product['price']?> грн</td>
                            <td><?=$productsQuantity[$product['id']]?></td>
                        </tr>
                    <? } ?>
                    <tr>
                        <td colspan="4"><b>Загальна вартість, грн:</b></td>
                        <td><b><?=$totalPrice?></b></td>
                    </tr>
                </table>

                <a href="/cabinet/history/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
            </div>
    </section>
    <br>
    <br>

<?php include ROOT . '/../app/views/layouts/footer.php'; ?>