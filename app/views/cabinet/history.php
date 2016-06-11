<?php include ROOT . '/../app/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/cabinet/">Особистий кабінет</a></li>
                        <li class="active">Історія замовлень</li>
                    </ol>
                </div>

                <h4>Історія замовлень</h4>

                <br>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID замовлення</th>
                        <th>Дата оформлення</th>
                        <th>Статус</th>

                    </tr>
                    <? foreach ($ordersList as $order) { ?>
                        <tr>
                            <td>
                                <a href="/cabinet/order/view/<?=$order['id']?>">
                                    <?=$order['id']?>
                                </a>
                            </td>
                            <td><?=$order['date']?></td>
                            <td><?=Order::getStatusText($order['status'])?></td>
                        </tr>
                    <? } ?>
                </table>

            </div>
        </div>
    </section>
    <br>
    <br>
<?php include ROOT . '/../app/views/layouts/footer.php'; ?>