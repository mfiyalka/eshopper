<? require_once(ROOT . '/../app/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <? if ($result) { ?>
                    <p >Нові дані успішно збережені!</p>
                <? } else { ?>
                    <? if (isset($errors) && is_array($errors)) { ?>
                        <ul>
                            <? foreach ($errors as $error) { ?>
                                <li > <?=$error?></li>
                            <? } ?>
                        </ul>
                    <? } ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Редагування даних</h2>
                        <form action="#" method="post">
                            <p>Ім'я:</p>
                            <input type="text" name="name" placeholder="Ім'я" value="<?=$name?>"/>
                            <p>Пароль:</p>
                            <input type="password" name="password" placeholder="Пароль" value="<?=$password?>"/>
                            <br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Зберегти" />
                        </form>
                    </div><!--/sign up form-->

                <? } ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<? require_once(ROOT . '/../app/views/layouts/footer.php'); ?>
