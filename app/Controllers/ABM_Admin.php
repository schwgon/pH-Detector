<?php

namespace App\Controllers;
use \App\Models\UserModel;

class ABM_Admin extends BaseController
{
    public function index_Admin()
    {
        $userModel = new UserModel();
        $resultado['usuarios'] = $userModel->Usuarios();

        echo view('common/header', ['session' => $this->session]);
        return view('admin', $resultado);
    }
    public function add_user()
    {
        echo view('common/header', ['session' => $this->session]); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        return view('inicio'); // Carga y muestra la vista 'inicio'.
    }
}
