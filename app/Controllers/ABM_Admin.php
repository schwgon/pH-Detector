<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\DeviceModel;

class ABM_Admin extends BaseController
{
    public function index_Admin()
    {
        $userModel = new UserModel();
        $deviceModel = new DeviceModel();
        $resultado['usuarios'] = $userModel->Usuarios();
        $resultado['dispositivos'] = $deviceModel->getAllDevices();

        echo view('common/header', ['session' => $this->session]);
        return view('admin', $resultado);
    }
    public function add_user()
    {
        echo view('common/header', ['session' => $this->session]); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        return view('inicio'); // Carga y muestra la vista 'inicio'.
    }

    public function delete($id){
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to(base_url('panel_admin'));
    }
    public function update($id_usuario)
    {
        $userModel = new UserModel();
        $datos = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'id_permiso' => $this->request->getPost('permiso')
        ];

        $userModel->update($id_usuario, $datos);
        return redirect()->to(base_url('panel_admin'));
    }
    public function edit($id_usuario)
    {
        $userModel = new UserModel();
        $datos['usuario'] = $userModel->find($id_usuario); // Utiliza find para obtener un solo registro
        echo view('common/header', ['session' => $this->session]);
        return view('edit', $datos);
    }
    
    public function delete_device($id_dispositivo)
    {
        $deviceModel = new DeviceModel();
        $deviceModel->delete($id_dispositivo);
        return redirect()->to(base_url('panel_admin'));
    }

    public function edit_device($id_dispositivo)
    {
        $deviceModel = new DeviceModel();
        $datos['dispositivo'] = $deviceModel->find($id_dispositivo); // Obtener el dispositivo específico

        echo view('common/header', ['session' => $this->session]);
        return view('edit_device', $datos); // Cargar la vista de edición del dispositivo
    }

    public function update_device($id_dispositivo)
    {
        $model = new DeviceModel();

        // Obtener los datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'id_usuario' => $this->request->getPost('id_usuario'),
            'id_barrio' => $this->request->getPost('id_barrio'),
            'id_calle' => $this->request->getPost('id_calle'),
            'id_medicion_bomba' => $this->request->getPost('id_medicion_bomba'),
        ];

        // Actualizar el dispositivo en la base de datos
        if ($model->updateDevice($id_dispositivo, $data)) {
            // Redirigir al panel de administración si se actualiza correctamente
            return redirect()->to('/panel_admin')->with('success', 'Dispositivo actualizado correctamente');
        } else {
            // Manejo de errores si la actualización falla
            return redirect()->back()->with('error', 'No se pudo actualizar el dispositivo');
        }
    }


}