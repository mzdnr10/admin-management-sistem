<?php

namespace Config;

use App\Controllers\ProgramController;

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'AuthController::index');
$routes->get('auth', 'AuthController::index');
$routes->post('doLogin', 'AuthController::doLogin');
$routes->get('logout', 'AuthController::logout');


$routes->get('dashboard', 'DashController::index');

$routes->get('tabeldosen', 'DosenController::index');
$routes->get('adddosen', 'DosenController::adddosen');
$routes->post('doadddosen', 'DosenController::doadddosen');
$routes->post('doadddata', 'DosenController::doadddata');
$routes->get('hapusdosen/(:num)', 'DosenController::hapusdosen/$1');
$routes->get('editdosen/(:num)', 'DosenController::editdosen/$1');
$routes->get('import-dosen', 'DosenController::importForm'); // Menampilkan form
$routes->post('import-dosen', 'DosenController::importExcel'); // Proses import
$routes->get('search-dosen', 'DosenController::searchdosen');


$routes->get('dataprogram', 'ProgramController::index');
$routes->get('addprogram', 'ProgramController::addprogram');
$routes->post('doaddprogram', 'ProgramController::doaddprogram');
$routes->get('hapusprogram/(:num)', 'ProgramController::hapusprogram/$1');
$routes->get('editprogram/(:num)', 'ProgramController::editprogram/$1');
$routes->post('doeditprogram/(:num)', 'ProgramController::doeditprogram/$1');
$routes->get('search-program', 'ProgramController::searchprogram');


$routes->get('administrator', 'AdminController::index');
$routes->get('adduser', 'AdminController::adduser');
$routes->post('doadduser', 'AdminController::doadduser');
$routes->get('hapususer/(:num)', 'AdminController::hapususer/$1');

$routes->get('profile', 'AdminController::profile');
$routes->post('doeditprofile/(:num)', 'AdminController::doeditprofile/$1');
$routes->post('doubahpassword/(:num)', 'AdminController::doubahpassword/$1');


$routes->get('dokumen', 'DashController::dokumen');
$routes->get('adddokumen', 'DashController::adddokumen');
$routes->get('hapusdokumen/(:num)', 'DashController::hapusdokumen/$1');
$routes->get('editdokumen/(:num)', 'DashController::editdokumen/$1');
$routes->post('doeditdokumen/(:num)', 'DashController::doeditdokumen/$1');
$routes->post('doadddokumen', 'DashController::doadddokumen');



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
