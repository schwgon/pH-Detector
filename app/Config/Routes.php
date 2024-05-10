<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'InicioController::index');

$routes->get('login', 'Auth::indexLogin');
$routes->get('register', 'Auth::indexRegister');
$routes->post('loginForm', "Auth::do_login");
$routes->post('register1', "Auth::do_register");
$routes->get('logout', 'Auth::logout');
