<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['session'] = \Config\Services::session(); // Obtener la instancia de la sesión
        echo view('common/header', $data);
        echo view('inicio');
    }
}
