<? require_once (ROOT . '/../app/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="features_items">
                        <h2 class="title text-center">Кошик</h2>

                        <? if ($productsInCart) { ?>
                            <p>Ви вибрали наступні товари:</p>
                            <table class="table-bordered table-striped table">
                                <tr>
                                    <th>Код товару</th>
                                    <th>Назва</th>
                                    <th>Вартість, грн</th>
                                    <th>Кількість, шт</th>
                                    <th>Всього, грн</th>
                                    <th>Видалити</th>
                                </tr>
                                <? foreach ($products as $product) { ?>
                                    <tr>
                                        <td><?=$product['code']?></td>
                                        <td>
                                            <a href="/product/<?=$product['id']?>">
                                                <?=$product['name']?>
                                            </a>
                                        </td>
                                        <td><?=$product['price']?></td>
                                        <td>
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href="/cart/inc/<?=$product['id']?>"> + </a>
                                                <input class="cart_quantity_input" type="text" name="quantity" value="<?=$productsInCart[$product['id']]?>" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href="/cart/dec/<?=$product['id']?>"> - </a>
                                            </div>
                                        </td>
                                        <td><?=$product['price'] * $productsInCart[$product['id']]?></td>
                                        <td>
                                            <a href="/cart/delete/<?=$product['id']?>">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <? } ?>
                                <tr>
                                    <td colspan="5">Загальна вартість, грн:</td>
                                    <td><?=$totalPrice?></td>
                                </tr>

                            </table>

                            <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформити замовлення</a>

                        <? } else { ?>
                            <p>Кошик пустий</p>

                            <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Повернутися до покупок</a>
                        <? } ?>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <br>

<? require_once (ROOT . '/../app/views/layouts/footer.php'); ?>