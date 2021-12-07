<?php
namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Usuario');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/usuario/login', 'Usuario::login');
$routes->get('/usuario/logout', 'Usuario::logout');

$routes->get('/clientes', 'Cliente::index');
$routes->post('/cliente/add', 'Cliente::create');
$routes->get('/cliente/(:num)', 'Cliente::show/$1');
$routes->put('/cliente/edit/(:num)', 'Cliente::update/$1');
$routes->delete('/cliente/delete/(:hash)', 'Cliente::delete/$1');




if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
