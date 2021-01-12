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


$routes->get('/cpanel', 'Cpanel/Home::index');

$routes->get('/cpanel/orders', 'Cpanel/orders::index');
$routes->get('/cpanel/orders/(:any)', 'Cpanel/orders::loaddata');

$routes->get('/cpanel/product', 'Cpanel/product::index');
$routes->get('/cpanel/product/create', 'Cpanel/product::create');
$routes->get('/cpanel/product/edit/(:any)', 'Cpanel/product::edit');
$routes->get('/cpanel/product/(:any)', 'Cpanel/product::loaddata');

$routes->get('/cpanel/properties', 'Cpanel/properties::index');
$routes->get('/cpanel/properties/(:any)', 'Cpanel/properties::loaddata');

$routes->get('/cpanel/category', 'Cpanel/category::index');
$routes->get('/cpanel/category/(:any)', 'Cpanel/category::loaddata');

$routes->get('/cpanel/size', 'Cpanel/size::index');
$routes->get('/cpanel/size/(:any)', 'Cpanel/size::loaddata');


$routes->get('/cpanel/color', 'Cpanel/color::index');
$routes->get('/cpanel/color/(:any)', 'Cpanel/color::loaddata');

$routes->get('/cpanel/shippingmethod', 'Cpanel/shippingmethod::index');
$routes->get('/cpanel/shippingmethod/(:any)', 'Cpanel/shippingmethod::loaddata');

$routes->get('/cpanel/users', 'Cpanel/users::index');
$routes->get('/cpanel/users/(:any)', 'Cpanel/users::loaddata');

$routes->get('/cpanel/email', 'Cpanel/email::index');
$routes->get('/cpanel/settings/home', 'Cpanel/settings::home');
$routes->get('/cpanel/settings/banner', 'Cpanel/settings::banner');
$routes->get('/cpanel/settings/email', 'Cpanel/settings::email');

$routes->get('/download/image', 'Download::image');
$routes->get('/download/(:any)/(:any)/(:any)/(:any)', 'Download::product/$1/$2/$3/$4');


$routes->get('/testlayout', 'Testlayout::index');
$routes->get('/order', 'Order::index');
$routes->get('/cart', 'Cart::index');
$routes->get('/payment', 'Payment::index');
$routes->get('/error', 'error::index');

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
