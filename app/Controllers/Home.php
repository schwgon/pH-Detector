<?php

namespace App\Controllers;

use \App\Models\DeviceModel;

class Home extends BaseController
{
    public function index() // Metodo para cargar la pagina principal
    {
        $deviceModel = new DeviceModel();
        $id_usuario = $this->session->get('user_id');
        $resultado = $deviceModel->Dispositivo($id_usuario);

        $this->session->set('dispositivos', $resultado);  // Guarda los datos en la sesión

        echo view('common/header');
        // echo view('common/footer');
        return view('inicio');
    }

    public function index1() // Metodo para cargar la pagina principal
    {
        // $deviceModel = new DeviceModel();
        // $id_usuario = $this->session->get('user_id');
        // $resultado = $deviceModel->Dispositivo($id_usuario);

        // $this->session->set('dispositivos', $resultado);  // Guarda los datos en la sesión

        echo view('common/header');
        // echo view('common/footer');
        return view('about_us');
    }
}
