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
    'cart/delete/([0-9]+)'              => 'cart/delete/$1',            // actionDelete в CartController
    'cart/add/([0-9]+)'                 => 'cart/add/$1',               // actionAdd в CartController
    'cart/addAjax/([0-9]+)'             => 'cart/addAjax/$1',           // actionAddAjax в CartController
    'cart'                              => 'cart/index',                // actionIndex в CartController
    // Користувач:
    'user/register'                     => 'user/register',             // actionRegister в UserController
    'user/login'                        => 'user/login',                // actionLogin в UserController
    'user/logout'                       => 'user/logout',               // actionLogout в UserController
    'cabinet/edit'                      => 'cabinet/edit',              // actionEdit в CabinetController
    'cabinet'                           => 'cabinet/index',             // actionIndex в CabinetController
    // Управление товарами:
    'admin/product/create'              => 'adminProduct/create',
    'admin/product/update/([0-9]+)'     => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)'     => 'adminProduct/delete/$1',
    'admin/product'                     => 'adminProduct/index',
    // Управление категориями:
    'admin/category/create'             => 'adminCategory/create',
    'admin/category/update/([0-9]+)'    => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)'    => 'adminCategory/delete/$1',
    'admin/category'                    => 'adminCategory/index',
    // Управление заказами:
    'admin/order/update/([0-9]+)'       => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)'       => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)'         => 'adminOrder/view/$1',
    'admin/order'                       => 'adminOrder/index',
    // Адмінпанель:
    'admin'                             => 'admin/index',               // actionIndex в AdminController
    // Про магазин:
    'contacts'                          => 'main/contact',              // actionContact в MainController
    // Головна сторінка
    'index.php'                         => 'site/index',                // actionIndex в SiteController
    ''                                  => 'main/index',                // actionIndex в MainController
);