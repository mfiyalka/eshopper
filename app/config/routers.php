<?php

return array(
    // Товар:
    'product/([0-9]+)'                  => 'product/view/$1',           // actionView в ProductController
    // Каталог:
    'catalog'                           => 'catalog/index',             // actionIndex в CatalogController
    // Категорії товарів:
    'category/([0-9]+)/page-([0-9]+)'   => 'catalog/category/$1/$2',    // actionCategory в CatalogController
    'category/([0-9]+)'                 => 'catalog/category/$1',       // actionCategory в CatalogController
    // Кошик:
    'cart/checkout'                     => 'cart/checkout',             // actionAdd в CartController
    'cart/add/([0-9]+)'                 => 'cart/add/$1',               // actionAdd в CartController
    'cart/addAjax/([0-9]+)'             => 'cart/addAjax/$1',           // actionAddAjax в CartController
    'cart'                              => 'cart/index',                // actionIndex в CartController
    // Користувач:
    'user/register'                     => 'user/register',             // actionRegister в UserController
    'user/login'                        => 'user/login',                // actionLogin в UserController
    'user/logout'                       => 'user/logout',               // actionLogout в UserController
    'cabinet/edit'                      => 'cabinet/edit',              // actionEdit в CabinetController
    'cabinet'                           => 'cabinet/index',             // actionIndex в CabinetController
    // Про магазин:
    'contacts'                          => 'main/contact',              // actionContact в MainController
    // Головна сторінка
    'index.php'                         => 'site/index',                // actionIndex в SiteController
    ''                                  => 'main/index',                // actionIndex в MainController
);