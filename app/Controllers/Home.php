<?php

namespace App\Controllers;

use \App\Models\DeviceModel;

class Home extends BaseController
{
    public function index()
    {
        $deviceModel = new DeviceModel();
        $id_usuario = $this->session->get('user_id');
        $resultado = $deviceModel->Dispositivo($id_usuario);
        $this->session->set('dispositivos', $resultado);
        echo view('common/header');
        return view('inicio');
    }

    public function index1()
    {
        echo view('common/header');
        return view('about_us');
    }

    public function about_us() {
        $data['session'] = \Config\Services::session(); // Obtiene la instancia de la sesion y la guarda en $data
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('about_us'); // Carga y muestra la vista 'inicio'.
        
    }

    public function about_us() {
        $data['session'] = \Config\Services::session(); // Obtiene la instancia de la sesion y la guarda en $data
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('about_us'); // Carga y muestra la vista 'inicio'.
        
    }
}
