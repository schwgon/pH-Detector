<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index() // Metodo para cargar la pagina principal
    {
        echo view('common/header', ['session' => $this->session]); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', ['session' => $this->session]);
        return view('inicio'); // Carga y muestra la vista 'inicio'.
    }
}
