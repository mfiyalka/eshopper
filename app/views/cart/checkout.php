<? require_once(ROOT . '/../app/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="features_items">
                        <h2 class="title text-center">Кошик</h2>
                        <div class="col-md-6 col-md-offset-3">


                            <? if ($result) { ?>
                                <p class="text-center">Замовлення оформлене. Ми Вам передзвонимо.</p>
                            <? } else { ?>

                                <p class="text-center">Вибрано товарів: <?= $totalQuantity ?>, на
                                    суму: <?= $totalPrice ?> грн</p><br/>

                                <? if (!$result) {

                                    if (isset($errors) && is_array($errors)) { ?>
                                        <ul>
                                            <? foreach ($errors as $error) { ?>
                                                <li class="text-center"> <?= $error ?></li>
                                            <? } ?>
                                        </ul>
                                    <? } ?>

                                    <p class="text-center">Для оформлення замовлення заповніть форму. Наш менеджер зв'яжеться з Вами.</p>

                                    <div class="login-form">
                                        <form action="#" method="post">

                                            <p>Ваше ім'я</p>
                                            <input type="text" name="userName" placeholder="Ваше ім'я"
                                                   value="<?=$userName?>"/>

                                            <p>Номер телефону</p>
                                            <input type="text" name="userPhone" placeholder="Номер телефону"
                                                   value="<?=$userPhone?>"/>

                                            <p>Місто доставки</p>
                                            <input type="text" name="userCity" placeholder="Місто доставки"
                                                   value="<?=$userCity?>"/>

                                            <p>Коментар до замовлення</p>
                                            <textarea name="userComment" placeholder="Коментар" cols="30"
                                                      rows="5"><?=$userComment?></textarea>
                                            <br>
                                            <button type="submit" name="submit" class="btn btn-default center-block">Оформити</button>
                                        </form>
                                    </div>

                                <? } ?>
                            <? } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>

<? require_once(ROOT . '/../app/views/layouts/footer.php'); ?>