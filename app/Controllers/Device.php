<?php

namespace App\Controllers;
use \App\Models\PaisModel;
use \App\Models\ProvinciaModel;
use \App\Models\CiudadModel;
use \App\Models\BarrioModel;
use \App\Models\CalleModel;
use \App\Models\DeviceModel;
use \App\Models\MedicionModel;

class Device extends BaseController
{
    // public function __construct() // Constructor: se ejecuta automaticamente al crear una instancia de la clase. Carga la biblioteca de sesion
    // {
    //     $this->session = \Config\Services::session(); // Inicializa la sesion utilizando el servicio de configuracion
    // }
    public function indexDevice()  // Metodo para cargar la vista del formulario de inicio de sesion
    {
        echo view('common/header', ['session' => $this->session]); // url en vez de return para llamar header y footer en otro contolador
        echo view('common/footer', ['session' => $this->session]);
        return view('device');
    }

    public function add_Device() // Metodo para procesar el registro de un nuevo dispositivo
    {
        $name = $this->request->getPost('name');
        $Id_device = $this->request->getPost('Id_device');
        $pais = $this->request->getPost('country');
        $provincia = $this->request->getPost('province');
        $barrio = $this->request->getPost('municipality');
        $ciudad = $this->request->getPost('city');
        $calle = $this->request->getPost('address');
        $id_usuario = $this->session->get('user_id');

        $paisModel = new PaisModel();
        $provinciaModel = new ProvinciaModel();
        $ciudadModel = new CiudadModel();
        $barrioModel = new BarrioModel();
        $calleModel = new CalleModel();
        $deviceModel = new DeviceModel();
        $medicionModel = new MedicionModel();

         // Verificar y obtener el ID del país
         $id_pais = $paisModel->add($pais);

         // Verificar y obtener el ID de la provincia
         $id_provincia = $provinciaModel->add($provincia, $id_pais);
 
         // Verificar y obtener el ID de la ciudad
         $id_ciudad = $ciudadModel->add($ciudad, $id_provincia);
 
         // Verificar y obtener el ID del barrio
         $id_barrio = $barrioModel->add($barrio, $id_ciudad);
         
         // Verificar y obtener el ID de la calle
         $id_calle = $calleModel->add($calle);
 
         // Agregar el dispositivo
         $dispositivoData = [
             'nombre' => $name,
             'id_dispositivo' => $Id_device,
             'id_calle' => $id_calle,
             'id_usuario' => $id_usuario,
             'id_barrio' => $id_barrio
         ];
        
        $deviceModel->add($dispositivoData);
 
        return redirect()->to(base_url('/'));
    }

    public function mostrarDatos($id_dispositivo) // Metodo para procesar el registro de un nuevo dispositivo
    {
        // $name = $this->request->getPost('name');
        $medicionModel = new MedicionModel();
        $medicionModel->mostrarDatos($id_dispositivo);

        // $datos = [
        //     'name' => $this->request->getPost('name'),
        //     'email' => $this->request->getPost('email'),
        //     'id_permiso' => $this->request->getPost('permiso')
        // ];

        return redirect()->to(base_url('panel_admin'));
    }
}