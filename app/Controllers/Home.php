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

    public function preguntas() {
        echo view('common/header'); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
    
        return view('preguntas'); // Carga y muestra la vista 'inicio'.
        
    }
    public function privacidad() {
        echo view('common/header'); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        return view('privacidad'); // Carga y muestra la vista 'inicio'.
        
    }

}
