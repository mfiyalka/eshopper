<? require_once(ROOT . '/../app/views/layouts/header.php'); ?>

    <section>
    <div class="container">
    <div class="row">

    <div class="col-sm-4 col-sm-offset-4 padding-right">

    <? if ($result) { ?>
        <p class="text-center">Ви зареєстровані!</p>
    <? } else { ?>
        <? if (isset($errors) && is_array($errors)) { ?>
            <ul>
                <? foreach ($errors as $error) { ?>
                    <li class="text-center"> <?=$error?></li>
                <? } ?>
            </ul>
        <? }?>

        <div class="signup-form"><!--sign up form-->
            <h2>Реєстрація на сайті</h2>
            <form action="#" method="post">
                <input type="text" name="name" placeholder="Name" value="<?= $name ?>"/>
                <input type="email" name="email" placeholder="E-mail" value="<?= $email ?>"/>
                <input type="password" name="password" placeholder="Password" value="<?= $password ?>"/>
                <button type="submit" name="submit" class="btn btn-default">Реєстрація</button>
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