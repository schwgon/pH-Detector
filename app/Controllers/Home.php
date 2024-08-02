<?php

namespace App\Controllers;

use \App\Models\DeviceModel;

class Home extends BaseController
{
    public function index() // Metodo para cargar la pagina principal
    {
        $deviceModel = new DeviceModel();

        $id_usuario = $this->session->get('user_id');
        
        $resultado['dispositivo'] = $deviceModel->Dispositivo($id_usuario);

        echo view('common/header', $resultado, ['session' => $this->session]); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', ['session' => $this->session]);
        return view('inicio'); // Carga y muestra la vista 'inicio'.
    }
}
