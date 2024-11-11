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
$routes->get('preguntas', 'Home::preguntas');
$routes->get('privacidad', 'Home::privacidad');

$routes->get('agregar_email', "Auth::agregar_email");
$routes->post('ObtenerCodigo', "Auth::ObtenerCodigo");
$routes->get('ObtenerCodigo', "Auth::ObtenerCodigo");
$routes->get('ingresarCodigoContra', "Auth::ingresarCodigoContra");
$routes->post('verificarCodigo', "Auth::verificarCodigo");

$routes->get('panel_admin', 'ABM_Admin::index_Admin', ['filter' => 'access']);
$routes->get('delete/(:num)', 'ABM_Admin::delete/$1', ['filter' => 'access']);
$routes->get('edit/(:num)', 'ABM_Admin::edit/$1', ['filter' => 'access']);
$routes->post('update/(:num)', 'ABM_Admin::update/$1', ['filter' => 'access']);

$routes->get('/edit_device/(:num)', 'ABM_Admin::edit_device/$1'); // Ruta para editar un dispositivo
$routes->get('delete_device/(:num)', 'ABM_Admin::delete_device/$1'); // Ruta para eliminar un dispositivo
$routes->post('update_device/(:num)', 'ABM_Admin::update_device/$1');

$routes->get('device', "Device::indexDevice");
$routes->post('add_device', "Device::add_Device");
$routes->get('mostrar_datos/(:num)', "Device::mostrarDatos/$1");
$routes->get('guardar_id', "Device::guardar_id");

$routes->post('ConexionController/recibir_datos', 'ConexionController::recibir_datos');
$routes->get('enviar_datos_nodemcu', 'ConexionController::enviarDatos');

$routes->setAutoRoute(true);

