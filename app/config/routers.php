<?php

return array(
    // Товар:
    'product/([0-9]+)'                  => 'product/view/$1',           // actionView в ProductController
    // Каталог:
    'catalog'                           => 'catalog/index',             // actionIndex в CatalogController
    // Категорії товарів:
    'category/brand/([0-9]+)/page-([0-9]+)'   => 'catalog/brand/$1/$2', // actionBrand в CatalogController
    'category/brand/([0-9]+)'           => 'catalog/brand/$1',          // actionBrand в CatalogController
    'category/([0-9]+)/page-([0-9]+)'   => 'catalog/category/$1/$2',    // actionCategory в CatalogController
    'category/([0-9]+)'                 => 'catalog/category/$1',       // actionCategory в CatalogController
    // Кошик:
    'cart/checkout'                     => 'cart/checkout',             // actionAdd в CartController
    'cart/delete/([0-9]+)'              => 'cart/delete/$1',            // actionDelete в CartController
    'cart/inc/([0-9]+)'                 => 'cart/quantityIncrement/$1', // actionQuantityIncrement в CartController
    'cart/dec/([0-9]+)'                 => 'cart/quantityDecrement/$1', // actionQuantityDecrement в CartController
    'cart/add/([0-9]+)'                 => 'cart/add/$1',               // actionAdd в CartController
    'cart/addAjax/([0-9]+)'             => 'cart/addAjax/$1',           // actionAddAjax в CartController
    'cart'                              => 'cart/index',                // actionIndex в CartController
    // Користувач:
    'user/register'                     => 'user/register',             // actionRegister в UserController
    'user/login'                        => 'user/login',                // actionLogin в UserController
    'user/logout'                       => 'user/logout',               // actionLogout в UserController
    'cabinet/edit'                      => 'cabinet/edit',              // actionEdit в CabinetController
    'cabinet/editpassword'              => 'cabinet/editpassword',      // actionEditPassword в CabinetController
    'cabinet/history'                   => 'cabinet/history',           // actionHistory в CabinetController
    'cabinet/order/view/([0-9]+)'       => 'cabinet/view/$1',           // actionView в CabinetController
    'cabinet'                           => 'cabinet/index',             // actionIndex в CabinetController
    // Керування товарами:
    'admin/product/create'              => 'adminProduct/create',       // actionCreate в AdminProductController
    'admin/product/update/([0-9]+)'     => 'adminProduct/update/$1',    // actionUpdate в AdminProductController
    'admin/product/delete/([0-9]+)'     => 'adminProduct/delete/$1',    // actionDetete в AdminProductController
    'admin/product'                     => 'adminProduct/index',        // actionIndex в AdminProductController
    // Керування категоріями:
    'admin/category/create'             => 'adminCategory/create',      // actionCreate в AdminCategoryController
    'admin/category/update/([0-9]+)'    => 'adminCategory/update/$1',   // actionUpdate в AdminCategoryController
    'admin/category/delete/([0-9]+)'    => 'adminCategory/delete/$1',   // actionDetete в AdminCategoryController
    'admin/category'                    => 'adminCategory/index',       // actionIndex в AdminCategoryController
    // КЕрування замовленнями:
    'admin/order/update/([0-9]+)'       => 'adminOrder/update/$1',      // actionUpdate в AdminOrderController
    'admin/order/delete/([0-9]+)'       => 'adminOrder/delete/$1',      // actionDetete в AdminOrderController
    'admin/order/view/([0-9]+)'         => 'adminOrder/view/$1',        // actionView в AdminOrderController
    'admin/order'                       => 'adminOrder/index',          // actionIndex в AdminOrderController
    // Адмінпанель:
    'admin'                             => 'admin/index',               // actionIndex в AdminController
    // Зворотній зв'язок:
    'contacts'                          => 'main/contact',              // actionContact в MainController
    // Головна сторінка
    'index.php'                         => 'site/index',                // actionIndex в SiteController
    ''                                  => 'main/index',                // actionIndex в MainController
);
