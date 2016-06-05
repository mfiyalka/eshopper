<? require_once(ROOT . '/../app/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <h3>Кабінет користувача</h3>

            <h4>Привіт, <?=$user['name']?>!</h4>
            <ul>
                <li><a href="/cabinet/edit">Редагувати персональні дані</a></li>
                <li><a href="/cabinet/history">Перелік покупок</a></li>
            </ul>

        </div>
    </div>
</section>

<? require_once(ROOT . '/../app/views/layouts/footer.php'); ?>
