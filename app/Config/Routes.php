<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Define la ruta para la página principal.
$routes->get('login', 'Auth::indexLogin'); // Define la ruta para la página de inicio de sesión.
$routes->get('register', 'Auth::indexRegister'); // Define la ruta para la página de registro.
$routes->post('loginForm', "Auth::do_login"); // Define la ruta para procesar el formulario de inicio de sesión.
$routes->post('register1', "Auth::do_register"); // Define la ruta para procesar el formulario de registro.
$routes->get('logout', 'Auth::logout'); // Define la ruta para cerrar sesión.
$routes->get('admin', "Auth::do_login"); // Define la ruta para el acceso de administrador.
$routes->get('perfil', "Auth::perfil");


$routes->get('panel_admin', 'ABM_Admin::index_Admin');
$routes->get('delete/(:num)', 'ABM_Admin::delete/$1');
$routes->get('edit/(:num)', 'ABM_Admin::edit/$1');
$routes->post('update/(:num)', 'ABM_Admin::update/$1');
$routes->get('editarPerfil', 'Auth::editarPerfil');
$routes->post('editarPerfil', 'Auth::editarPerfil');

$routes->get('device', "Device::indexDevice");
