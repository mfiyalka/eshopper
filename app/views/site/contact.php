<? require_once (ROOT . '/../app/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <? if ($result) { ?>
                        <p>Повідомлення відправлене! Ми надамо Вам відповідь на вказаний email.</p>
                    <? } else { ?>
                        <? if (isset($errors) && is_array($errors)) { ?>
                            <ul>
                                <? foreach ($errors as $error) { ?>
                                    <li> - <?=$error?></li>
                                <? } ?>
                            </ul>
                        <? } ?>

                        <div class="signup-form"><!--sign up form-->
                            <h2>Зворотній зв'язок</h2>
                            <h5>У Вас є питання? Напишіть нам</h5>
                            <br/>
                            <form action="#" method="post">
                                <p>Ваша пошта</p>
                                <input type="email" name="userEmail" placeholder="E-mail" value="<?=$userEmail?>">
                                <p>Повідомлення</p>
                                <textarea name="userText" cols="30" rows="5" placeholder="Повідомлення" value="<?=$userText?>"></textarea>
                                <br>
                                <br>
                                <input type="submit" name="submit" class="btn btn-default" value="Відправити">
                            </form>
                        </div><!--/sign up form-->
                    <? } ?>

                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section>

<? require_once (ROOT . '/../app/views/layouts/footer.php'); ?>