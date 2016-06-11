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
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Останні товари</h2>

                        <? foreach ($categoryProduct as $key => $product) {?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?=Product::getImage($product['id'])?>" alt="" />
                                            <h2><?=$product['price']?> грн</h2>
                                            <p><a href="/product/<?=$product['id']?>"><?=$product['name']?></a></p>
                                            <a href="#" class="btn btn-default add-to-cart" data-id="<?=$product['id']?>"><i class="fa fa-shopping-cart"></i>В кошик</a>
                                        </div>
                                        <? if ($product['is_new']) {?>
                                            <img src="/images/home/new.png" class="new" alt="">
                                        <?}?>
                                    </div>
                                </div>
                            </div>
                        <?}?>

                    </div><!--features_items-->
                    <!-- Навігація по сторінках-->
                    <?=$pagination->get()?>

                </div>
            </div>
        </div>
    </section>

<? require_once (ROOT . '/../app/views/layouts/footer.php'); ?>