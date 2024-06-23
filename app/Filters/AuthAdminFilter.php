<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Verifica si el usuario no está logueado
        if (!$session->get('user_id')) {

        }

        // Verifica si el usuario no es administrador
        if (!$session->get('is_admin')) {

        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No hay necesidad de realizar ninguna acción después de la solicitud
    }
}