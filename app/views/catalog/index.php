<? require_once (ROOT . '/../app/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">

                            <? foreach ($categories as $categoryItem) {?>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="/category/<?=$categoryItem['id']?>"><?=$categoryItem['name']?></a></h4>
                                    </div>
                                </div>

                            <?}?>

                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Останні товари</h2>

                        <? foreach ($latestProduct as $key => $product) {?>
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

                </div>
            </div>
        </div>
    </section>

<? require_once (ROOT . '/../app/views/layouts/footer.php'); ?>