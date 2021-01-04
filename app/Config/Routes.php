<?php

namespace Config;

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
$routes->get('/detail/(:any)', 'Home::detail/$1');
$routes->get('/admin', 'Admin\Dashboard::index', ['filter' => 'role:admin']);
$routes->get('/categories/(:any)', 'Home::showCategories/$1');


// Categories
$routes->group('admin', ['filter' => 'role:admin'], function($routes){
	// Dashboard
	$routes->get('dashboard', 'Admin\Dashboard::index');
	$routes->get('dashboard/index', 'Admin\Dashboard::index');

	// Categories
	$routes->get('categories', 'Admin\Categories::index');
	$routes->get('categories/index', 'Admin\Categories::index');

	// Products
	$routes->get('products', 'Admin\Products::index');
	$routes->get('products/index', 'Admin\Products::index');
	$routes->get('products/images/(:any)', 'Admin\Pictures::index/$1');
	$routes->post('images/uploads/(:any)', 'Admin\Pictures::upload/$1');
	
	// Pictures
	$routes->delete('images/(:any)', 'Admin\Pictures::delete/$1');
	
	// Toko Detail
	$routes->get('options/', 'Admin\Toko_detail::index');
	$routes->get('options/index', 'Admin\Toko_detail::index');
	$routes->get('options/show', 'Admin\Toko_detail::show');
	$routes->post('options/store', 'Admin\Toko_detail::simpan');
	$routes->post('options/store/(:num)', 'Admin\Toko_detail::simpan/$1');
	$routes->get('options/rajaongkir/(:any)/(:any)', 'Admin\Toko_detail::rajaongkir/$1/$2');
	$routes->get('options/rajaongkir/(:any)', 'Admin\Toko_detail::rajaongkir/$1');
	
	// Transaction
	$routes->get('transactions', 'Admin\Transactions::index');
	$routes->get('transactions/index', 'Admin\Transactions::index');
	$routes->get('transactions/show', 'Admin\Transactions::show');
	$routes->get('transactions/detail/(:any)', 'Admin\Transactions::detail/$1');
	$routes->get('transactions/edit/(:any)', 'Admin\Transactions::edit/$1');
	$routes->put('transactions/edit/(:any)', 'Admin\Transactions::update/$1');
	$routes->delete('transactions/(:num)', 'Admin\Transactions::delete/$1');
	// $routes->post('transactions/update/(:any)', 'Admin\Transactions::update/$1');

	// Users
	$routes->get('users', 'Admin\Users::index');
	$routes->get('users/index', 'Admin\Users::index');
	$routes->get('profile/(:segment)', 'Users::profile/$1');
});

// $routes->get('/admin/categories', 'Admin\Categories::index', ['filter' => 'role:admin']);
$routes->delete('/admin/categories/(:num)', 'Admin\Categories::delete/$1');
$routes->get('/admin/categories/(:num)', 'Admin\Categories::edit/$1');
$routes->post('/admin/categories/add', 'Admin\Categories::add');
$routes->get('/admin/categories/show', 'Admin\Categories::show');
$routes->post('/admin/categories/update/(:num)', 'Admin\Categories::update/$1');
$routes->get('/admin/categories/active', 'Admin\Categories::categoryActive');

// Products
// $routes->get('/admin/products', 'Admin\Products::index');
$routes->get('/admin/products/show', 'Admin\Products::show');
$routes->get('/admin/products/(:num)', 'Admin\Products::edit/$1');
$routes->delete('/admin/products/(:num)', 'Admin\Products::delete/$1');
$routes->post('/admin/products/add', 'Admin\Products::add');
$routes->post('/admin/products/update/(:num)', 'Admin\Products::update/$1');

// Users
$routes->get('/admin/users/(:num)', 'Admin\Users::detail/$1');
$routes->put('/admin/users/(:num)', 'Admin\Users::update/$1');
$routes->delete('/admin/users/(:num)', 'Admin\Users::delete/$1');

// carts
$routes->get('/carts', 'Frontend\Carts::index', ['filter' => 'role:user,admin']);
$routes->get('/carts/index', 'Frontend\Carts::index', ['filter' => 'role:user,admin']);
$routes->get('/carts/show', 'Frontend\Carts::show', ['filter' => 'role:user,admin']);
$routes->post('/carts/(:num)', 'Frontend\Carts::plus/$1', ['filter' => 'role:user,admin']);
$routes->post('/carts/catatan/(:num)', 'Frontend\Carts::updateCatatan/$1');
$routes->delete('/carts/(:num)', 'Frontend\Carts::delete/$1', ['filter' => 'role:user,admin']);
$routes->delete('/carts', 'Frontend\Carts::delete', ['filter' => 'role:user,admin']);

// Order
$routes->get('/order', 'Frontend\Transactions::index', ['filter' => 'role:user,admin']);
$routes->get('/order/index', 'Frontend\Transactions::index', ['filter' => 'role:user,admin']);
$routes->get('/order/(:any)', 'Frontend\Transactions::index/$1', ['filter' => 'role:user,admin']);
$routes->post('/order', 'Frontend\Transactions::addTransaction', ['filter'	=> 'role:user,admin']);
$routes->post('/order/success', 'Frontend\Transactions::success', ['filter'	=> 'role:user,admin']);

$routes->get('/profile', 'Frontend\Transactions::show', ['filter' => 'role:user,admin']);


// Raja Ongkir
$routes->get('/rajaongkir/(:any)/(:any)', 'RajaOngkir::rajaongkir/$1/$2');
$routes->get('/rajaongkir/(:any)', 'RajaOngkir::rajaongkir/$1');
$routes->post('/ongkir', 'RajaOngkir::ongkir');

// Api 
$routes->group('api',function($routes){

	$routes->resource('api/products', ['controller' => 'Api\Products']);
	$routes->resource('api/categories', ['controller' => 'Api\Categories']);
});

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
