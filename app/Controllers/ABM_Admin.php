<?php

namespace App\Controllers;
use \App\Models\UserModel;

class ABM_Admin extends BaseController
{
    public function index_Admin(){
        $userModel = new UserModel();
        $resultado['usuarios'] = $userModel->Usuarios();
        echo view('common/header');
        return view('admin', $resultado);
    }

    public function add_user(){
        echo view('common/header');
        return view('inicio');
    }

    public function delete($id){
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to(base_url('panel_admin'));
    }

    public function update($id_usuario){
        $userModel = new UserModel();
        $datos = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'id_permiso' => $this->request->getPost('permiso')
        ];
        $userModel->update($id_usuario, $datos);
        return redirect()->to(base_url('panel_admin'));
    }
}
