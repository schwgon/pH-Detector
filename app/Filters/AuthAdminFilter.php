<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdminFilter implements FilterInterface
{
    // public function before(RequestInterface $request, $arguments = null)
    // {
    //     $session = session();

    //     // Verifica si el usuario no está logueado
    //     if (!$session->get('user_id')) {

    //     }

    //     // Verifica si el usuario no es administrador
    //     if (!$session->get('is_admin')) {

    //     }
    // }

    // public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    // {
    //     // No hay necesidad de realizar ninguna acción después de la solicitud
    // }

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // $currentRoute = current_url(); // Obtén la URL actual
        $currentRoute = $request->getUri()->getPath(); // Obtén la ruta actual

        // // No redirigir si la URL actual es la página de inicio de sesión
        // if ($currentRoute === base_url('login') || $currentRoute === base_url('loginForm')) {
        //     return;
        // }

        // No redirigir si la URL actual es la página de inicio de sesión o el procesamiento de inicio de sesión
        if ($currentRoute === 'login' || $currentRoute === 'loginForm') {
            return; // No hacer nada si estamos en una de estas rutas
        }

        

        // // Verifica si el usuario no está logueado
        // if (!$session->get('user_id')) {
        //     // Redirige a la página de inicio de sesión si no está autenticado
        //     return redirect()->to(base_url(''))->with('error_message', 'Necesitas iniciar sesión para acceder a esta página.');
        // }

        // Verifica si el usuario está logueado
        if (!$session->get('user_id')) {
            // Redirige a la página de inicio de sesión si no está autenticado
            return; // redirect()->to(base_url('/'))->with('error_message', 'Necesitas iniciar sesión para acceder a esta página.');
        }

        // Verifica si el usuario no es administrador
        if (!$session->get('is_admin')) {
            // Redirige a la página principal o muestra un mensaje de error
            return; // redirect()->to(base_url('/'))->with('error_message', 'No tienes permiso para acceder a esta página.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No hay necesidad de realizar ninguna acción después de la solicitud
    }
}