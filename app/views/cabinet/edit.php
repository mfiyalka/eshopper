<? require_once(ROOT . '/../app/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/cabinet">Особистий кабінет</a></li>
                    <li class="active">Редагування персональних даних</li>
                </ol>
            </div>

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <? if ($result) { ?>
                    <div class="text-center">
                        <p>Нові дані успішно збережені!</p>
                    </div>
                <? } else { ?>
                    <? if (isset($errors) && is_array($errors)) { ?>
                        <ul>
                            <? foreach ($errors as $error) { ?>
                                <li class="text-center"> <?= $error ?></li>
                            <? } ?>
                        </ul>
                    <? } ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Редагування персональних даних</h2>
                        <form action="#" method="post">
                            <p>Ім'я:</p>
                            <input type="text" name="name" placeholder="Ім'я" value="<?= $name ?>"/>
                            <p>Телефон:</p>
                            <input type="phone" name="phone" placeholder="Телефон +380" value="<?= $phone ?>"/>
                            <br>
                            <button type="submit" name="submit" class="btn btn-default">Зберегти</button>
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
