<?php

namespace App\Controllers;
use \App\Models\DeviceModel;
use \App\Models\ProvinciaModel;
use \App\Models\CiudadModel;
use \App\Models\BarrioModel;
use \App\Models\CalleModel;
use \App\Models\MedicionModel;

class Device extends BaseController
{
    public function indexDevice()  // Metodo para cargar la vista del formulario de inicio de sesion
    {
        echo view('common/header');
         echo view('common/footer');
        return view('device');
    }
    public function add_Device() // Metodo para procesar el registro de un nuevo dispositivo
    {
        $name = $this->request->getPost('name');
        $Id_device = $this->request->getPost('Id_device');
        $provincia = $this->request->getPost('province');
        $barrio = $this->request->getPost('municipality');
        $ciudad = $this->request->getPost('city');
        $calle = $this->request->getPost('address');
        $id_usuario = $this->session->get('user_id');

        $provinciaModel = new ProvinciaModel();
        $ciudadModel = new CiudadModel();
        $barrioModel = new BarrioModel();
        $calleModel = new CalleModel();
        $deviceModel = new DeviceModel();


        // Verificar y obtener el ID de la provincia
        $id_provincia = $provinciaModel->add($provincia);
 
        // Verificar y obtener el ID de la ciudad
        $id_ciudad = $ciudadModel->add($ciudad, $id_provincia);
 
        // Verificar y obtener el ID del barrio
        $id_barrio = $barrioModel->add($barrio, $id_ciudad);
 
        // Verificar y obtener el ID de la calle
        $id_calle = $calleModel->add($calle);
 
        // Agregar el dispositivo
        $dispositivoData = [
            'nombre' => $name,
            'Id_dispositivo' => $Id_device,
            'id_calle' => $id_calle,
            'id_barrio' => $id_barrio,
            'id_usuario' => $id_usuario
        ];
         
        $deviceModel->add($dispositivoData);
 
        return redirect()->to(base_url('/'))->with('success_message', 'Dispositivo agregado exitosamente.');
    }

    public function mostrarDatos($id_dispositivo)
    {
        $medicionModel = new MedicionModel();
        $datos['datos'] = $medicionModel->mostrarDatos($id_dispositivo);

        echo view('common/header');
        return view('datos', $datos);
    }

    public function guardar_id()
    {
        $id_dispositivo = $this->request->getPost('id_dispositivo');

        // Guardar el ID en la base de datos
        $deviceModel = new DeviceModel();
        $data = [
            'id_dispositivo' => $id_dispositivo,
        ];
        $deviceModel->save($data);

        return redirect()->to('login')->with('error_message', 'ID guardado exitosamente');
    }
}