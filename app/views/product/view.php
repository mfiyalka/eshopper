<? require_once (ROOT . '/../app/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"><!-- catalog -->
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">

                        <? foreach ($categories as $categoryItem) { ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a
                                            href="/category/<?= $categoryItem['id'] ?>" class="<? if(@$categoryId == $categoryItem['id']) echo 'active';?>"><?= $categoryItem['name'] ?></a>
                                    </h4>
                                </div>
                            </div>

                        <? } ?>
                    </div>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Виробники</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">

                                <? foreach ($brands as $brandsItem) { ?>
                                    <li><a href="/category/brand/<?= $brandsItem['id'] ?>"> <span class="pull-right">(<?= $brandsItem['count'] ?>)</span><?= $brandsItem['name'] ?></a></li>
                                <? } ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                </div>
            </div><!-- catalog -->

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?=Product::getImage($product['id'])?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->

                                <? if ($product['is_new']) {?>
                                    <img src="/images/product-details/new.jpg" class="newarrival" alt="">
                                <?}?>

                                <h2><?=$product['name']?></h2>
                                <p>Код товару: <?=$product['code']?></p>
                                        <span>
                                            <span><?=$product['price']?> грн</span>
                                            <label>Кількість:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart add-to-cart" data-id="<?=$product['id']?>">
                                                <i class="fa fa-shopping-cart"></i>
                                                В кошик
                                            </button>
                                        </span>
                                <p><b>Наявність:</b> <?= $product['availability'] == 1 ? 'На складі' : 'Відсутній'?></p>
                                <p><b>Стан:</b> Нове</p>
                                <p><b>Виробник:</b> <?=$product['brand']?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Опис товару</h5>
                            <p><?=$product['description']?></p>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>


<br/>
<br/>

<? require_once (ROOT . '/../app/views/layouts/footer.php'); ?>