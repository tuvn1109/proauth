<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/auth', 'Auth::index');
$routes->get('/auth/signup', 'Auth::signup');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/auth/resetpass/(:any)', 'Auth::resetpass');


$routes->get('/cpanel', 'Cpanel/Home::index');

$routes->get('/cpanel/orders', 'Cpanel/Orders::index');
$routes->get('/cpanel/orders/loadstatus', 'Cpanel/Orders::loadstatus');
$routes->get('/cpanel/orders/(:any)', 'Cpanel/Orders::loaddata');

$routes->get('/cpanel/product', 'Cpanel/Product::index');
$routes->get('/cpanel/product/create', 'Cpanel/Product::create');
$routes->get('/cpanel/product/edit/(:any)', 'Cpanel/Product::edit');
$routes->get('/cpanel/product/(:any)', 'Cpanel/Product::loaddata');

$routes->get('/cpanel/feelback', 'Cpanel/Feelback::index');
$routes->get('/cpanel/feelback/(:any)', 'Cpanel/Feelback::loaddata');

$routes->get('/cpanel/subscribes', 'Cpanel/Subscribes::index');
$routes->get('/cpanel/subscribes/(:any)', 'Cpanel/Subscribes::loaddata');


$routes->get('/cpanel/properties', 'Cpanel/Properties::index');
$routes->get('/cpanel/properties/(:any)', 'Cpanel/Properties::loaddata');

$routes->get('/cpanel/category', 'Cpanel/Category::index');
$routes->get('/cpanel/category/(:any)', 'Cpanel/Category::loaddata');

$routes->get('/cpanel/size', 'Cpanel/Size::index');
$routes->get('/cpanel/size/(:any)', 'Cpanel/Size::loaddata');


$routes->get('/cpanel/color', 'Cpanel/Color::index');
$routes->get('/cpanel/color/(:any)', 'Cpanel/Color::loaddata');

$routes->get('/cpanel/coupon', 'Cpanel/Coupon::index');
$routes->get('/cpanel/coupon/(:any)', 'Cpanel/Coupon::loaddata');

$routes->get('/cpanel/page', 'Cpanel/Page::index');
$routes->get('/cpanel/page/create', 'Cpanel/Page::create');
$routes->get('/cpanel/page/edit/(:any)', 'Cpanel/Page::edit');

$routes->get('/cpanel/page/(:any)', 'Cpanel/Page::loaddata');


$routes->get('/cpanel/shippingmethod', 'Cpanel/Shippingmethod::index');
$routes->get('/cpanel/shippingmethod/(:any)', 'Cpanel/Shippingmethod::loaddata');

$routes->get('/cpanel/users', 'Cpanel/Users::index');
$routes->get('/cpanel/users/edit/(:any)', 'Cpanel/Users::edit');
$routes->get('/cpanel/users/(:any)', 'Cpanel/Users::loaddata');

$routes->get('/cpanel/email', 'Cpanel/Email::index');
$routes->get('/cpanel/settings/home', 'Cpanel/Settings::home');
$routes->get('/cpanel/settings/banner', 'Cpanel/Settings::banner');
$routes->get('/cpanel/settings/email', 'Cpanel/Settings::email');

$routes->get('/download/image', 'Download::image');
$routes->get('/download/(:any)/(:any)/(:any)/(:any)', 'Download::product/$1/$2/$3/$4');


$routes->get('/testlayout', 'Testlayout::index');
$routes->get('/order', 'Order::index');
$routes->get('/trackorder', 'Trackorder::index');
$routes->get('/cart', 'Cart::index');
$routes->get('/search', 'Search::index');
$routes->get('/search/(:any)', 'Search::search/$1');
$routes->get('/account', 'Account::index');
$routes->get('/account/order', 'Account::order');
$routes->get('/payment', 'Payment::index');
$routes->get('/favourite', 'Favourite::index');
$routes->get('/error', 'error::index');


//$routes->get('/(:any)', 'Page::index/$1');


$routes->get('/(:any)/(:any)', 'Category::product/$1/$2');
$routes->get('/(:any)', 'Category::index/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
