<?php

namespace App\Controllers;

use \App\Models\DeviceModel;

class Home extends BaseController
{
    public function index(){
        $deviceModel = new DeviceModel();
        $id_usuario = $this->session->get('user_id');
        $resultado = $deviceModel->Dispositivo($id_usuario);
        $this->session->set('dispositivos', $resultado);
        echo view('common/header');
        return view('inicio');
    }

    public function index1(){
        echo view('common/header');
        echo view('common/footer');
        return view('about_us');
    }
}
