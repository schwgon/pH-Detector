<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index() // Metodo para cargar la pagina principal
    {
        $data['session'] = \Config\Services::session(); // Obtiene la instancia de la sesion y la guarda en $data
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        return view('inicio'); // Carga y muestra la vista 'inicio'.
    }

    public function preguntas() {
        $data['session'] = \Config\Services::session(); // Obtiene la instancia de la sesion y la guarda en $data
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('preguntas'); // Carga y muestra la vista 'inicio'.
        
    }
    public function privacidad() {
        $data['session'] = \Config\Services::session(); // Obtiene la instancia de la sesion y la guarda en $data
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('privacidad'); // Carga y muestra la vista 'inicio'.
        
    }

}
