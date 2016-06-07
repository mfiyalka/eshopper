<? require_once (ROOT . '/../app/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">
                            <? foreach ($categories as $categoryItem) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?=$categoryItem['id']?>">
                                                <?=$categoryItem['name']?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">Кошик</h2>


                        <? if ($result) { ?>
                            <p>Замовлення оформлене. Ми Вам передзвонимо.</p>
                        <? } else { ?>

                            <p>Вибрано товарів: <?=$totalQuantity?>, на суму: <?=$totalPrice?> грн</p><br/>

                            <? if (!$result) { ?>

                                <div class="col-sm-4">
                                    <? if (isset($errors) && is_array($errors)) { ?>
                                        <ul>
                                            <? foreach ($errors as $error) { ?>
                                                <li> - <?=$error?></li>
                                            <? } ?>
                                        </ul>
                                    <? } ?>

                                    <p>Для оформлення замовлення заповніть форму. Наш менеджер зв'яжеться з Вами.</p>

                                    <div class="login-form">
                                        <form action="#" method="post">

                                            <p>Ваше ім'я</p>
                                            <input type="text" name="userName" placeholder="Ваше ім'я" value="<?=$userName?>"/>

                                            <p>Номер телефону</p>
                                            <input type="text" name="userPhone" placeholder="Номер телефону" value="<?=$userPhone?>"/>

                                            <p>Коментар до замовлення</p>
                                            <textarea name="userComment" placeholder="Коментар" cols="30" rows="5"><?=$userComment?></textarea>
                                            <br>
                                            <br>
                                            <input type="submit" name="submit" class="btn btn-default" value="Оформити" />
                                        </form>
                                    </div>
                                </div>

                            <? } ?>
                        <? } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

<? require_once (ROOT . '/../app/views/layouts/footer.php'); ?>