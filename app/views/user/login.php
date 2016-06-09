<? require_once(ROOT . '/../app/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <? if (isset($errors) && is_array($errors)) { ?>
                    <ul>
                        <? foreach ($errors as $error) { ?>
                            <li class="text-center"> <?=$error?></li>
                        <? } ?>
                    </ul>
                <? } ?>

                <div class="login-form"><!--login form-->
                    <h2>Вхід на сайт</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="E-mail" value="<?=$email?>"/>
                        <input type="password" name="password" placeholder="Password" value="<?=$password?>"/>
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            <span>
								<a href="/user/register">   Зареєструватися</a>
							</span>
                        <button type="submit" name="submit" class="btn btn-default">Вхід</button>
                    </form>
                </div><!--/login form-->

                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<? require_once(ROOT . '/../app/views/layouts/footer.php'); ?>