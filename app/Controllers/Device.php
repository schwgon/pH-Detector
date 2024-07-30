<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\DeviceModel;
class Device extends BaseController
{
    public function __construct() // Constructor: se ejecuta automaticamente al crear una instancia de la clase. Carga la biblioteca de sesion
    {
        $this->session = \Config\Services::session(); // Inicializa la sesion utilizando el servicio de configuracion
    }
    public function indexDevice()  // Metodo para cargar la vista del formulario de inicio de sesion
    {
        $data['session'] = \Config\Services::session(); // Guarda la sesion actual en el arreglo $data
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('device');
    }
}