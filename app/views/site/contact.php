<? require_once(ROOT . '/../app/views/layouts/header.php'); ?>

    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Зворотній зв'язок</h2>
                        <div class="status alert alert-success" style="display: none"></div>


<? if ($result) { ?>
    <p class="text-center">Повідомлення відправлене! Ми надамо Вам відповідь на вказаний email.</p>

<? } else { ?>
    <? if (isset($errors) && is_array($errors)) { ?>
        <ul>
            <? foreach ($errors as $error) { ?>
                <li class="text-center"><?=$error?></li>
            <? } ?>
        </ul>
    <? } ?>

                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Ім'я" value="<?=$userName?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" value="<?=$userEmail?>">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Тема повідомлення" value="<?=$userSubject?>">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Ваше повідомлення"><?=$userMessage?></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Надіслати">
                            </div>
                        </form>

<? } ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address>
                            <p>M-Fiyalka Inc.</p>
                            <p>58 Naberezhna Peremohy Str.</p>
                            <p>Dnipro Ukraine</p>
                            <p>Mobile: +38 098 1915532</p>
                            <p>Email: mfiyalka@gmail.com</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#contact-page-->

<? require_once(ROOT . '/../app/views/layouts/footer.php'); ?>