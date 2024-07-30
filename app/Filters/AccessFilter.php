<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AccessFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session(); // Obtiene la sesión actual
        $currentRoute = $request->getUri()->getPath(); // Obtiene la ruta solicitada
        
        // URLs accesibles sin sesión activa
        $publicRoutes = ['login', 'register', 'home'];

        // URLs accesibles con sesión activa
        $authenticatedRoutes = ['profile', 'logout', 'panel_admin', 'edit', 'delete'];

        // URLs accesibles solo para administradores
        $adminRoutes = ['panel_admin', 'edit', 'delete'];

        // Si la ruta actual está en la lista de públicas, no se necesita sesión
        if (in_array($currentRoute, $publicRoutes)) { // Si la ruta es pública, no se aplica ningún filtro
            return;
        }

        // Si no hay sesión activa y la ruta no es pública
        if (!$session->get('user_id')) { // Redirige al usuario a la página de inicio de sesión si no hay una sesión activa
            return redirect()->to(base_url('login'))->with('error_message', 'Necesitas iniciar sesión.');
        }

        // Si hay sesión activa pero la ruta no es accesible para usuarios autenticados
        if (in_array($currentRoute, $authenticatedRoutes) && !$session->get('is_admin') && !in_array($currentRoute, $publicRoutes)) { // Redirige a la página principal si el usuario está autenticado pero intenta acceder a una ruta que no está permitida para usuarios no administradores
            return redirect()->to(base_url('/'))->with('error_message', 'No tienes permiso para acceder a esta página.');
        }

        // Si es administrador y la ruta no está permitida para administradores
        // Si no es administrador y la ruta no está permitida para el usuario 
        if (!$session->get('is_admin') && !in_array($currentRoute, $adminRoutes)) { // Redirige si el usuario no es administrador pero intenta acceder a una ruta que no está permitida para el
            return redirect()->to(base_url('/'))->with('error_message', 'No tienes permiso para acceder a esta página.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita ninguna acción después de la solicitud
    }
}