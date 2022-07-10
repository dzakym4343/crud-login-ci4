<?php

namespace Config;

use App\Controllers\ActionController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->setAutoRoute(true);
$routes->group('', static function ($routes) {
    $routes->get('/', 'Home::index');
});

$routes->group('pages', static function ($routes) {
    $routes->get('home', 'Home::index');
    $routes->get('profile', 'ProfileController::index');
    $routes->get('buku/list/(:segment)', 'Home::read_data/$1');
    $routes->get('buku/add', 'Home::add_data');
    $routes->get('buku/edit/(:segment)', 'Home::update_data/$1');

    $routes->group('user', static function ($routes) {
        $routes->get('add', 'UsersController::addDataPage');
        $routes->get('list', 'UsersController::index');
    });
});

$routes->group('auth', static function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->get('register', 'Auth::register');
});

$routes->get('/logout', 'Auth::logout');

$routes->group('action', static function ($routes) {
    $routes->group('profile', static function ($routes) {
        $routes->post('update/password/(:num)', 'Action::changePassword/$1');
        $routes->post('update/name/(:num)', 'Action::changeName/$1');
    });
    $routes->group('user', static function ($routes) {
        $routes->post('add', 'Action::addUser');
        $routes->get('delete/(:num)', 'Action::deleteUser/$1');
    });

    $routes->post('add', 'Action::addDataBuku');
    $routes->post('profile/update/(:num)', 'Action::editProfile/$1');
    $routes->post('update/(:segment)', 'Action::updateDataBuku/$1');
    $routes->get('delete/(:num)', 'Action::deleteDataBuku/$1');
    $routes->post('process_login', 'Action::process_login');
    $routes->post('process_register', 'Action::process_register');
});


/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
