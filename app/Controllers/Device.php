<?php

namespace App\Controllers;
use \App\Models\DeviceModel;
use \App\Models\ProvinciaModel;
use \App\Models\CiudadModel;
use \App\Models\BarrioModel;
use \App\Models\CalleModel;
use \App\Models\MedicionModel;
use \App\Models\LitrosModel;

class Device extends BaseController
{
    private $provinciaModel;
    private $ciudadModel;
    private $barrioModel;
    private $calleModel;
    private $deviceModel;
    private $medicionModel;
    private $litrosModel;

    public function __construct(){
        $this->provinciaModel = new ProvinciaModel();
        $this->ciudadModel = new CiudadModel();
        $this->barrioModel = new BarrioModel();
        $this->calleModel = new CalleModel();
        $this->deviceModel = new DeviceModel();
        $this->medicionModel = new MedicionModel();
        $this->litrosModel = new LitrosModel();
    }

    public function indexDevice(){
        echo view('common/header');
        return view('device');
    }
    public function add_Device(){
        $nombre = $this->request->getPost('name');
        $id_dispositivo = $this->request->getPost('id_dispositivo');
        $litros = $this->request->getPost('litros');
        $provincia = $this->request->getPost('province');
        $barrio = $this->request->getPost('municipality');
        $ciudad = $this->request->getPost('city');
        $calle = $this->request->getPost('address');
        $id_usuario = $this->session->get('user_id');

        $id_provincia = $this->provinciaModel->add($provincia);
        $id_ciudad = $this->ciudadModel->add($ciudad, $id_provincia);
        $id_barrio = $this->barrioModel->add($barrio, $id_ciudad);
        $id_calle = $this->calleModel->add($calle);
        $id_litros = $this->litrosModel->add($litros);

        $dispositivoData = [
            'nombre' => $nombre,
            'id_dispositivo' => $id_dispositivo,
            'id_calle' => $id_calle,
            'id_barrio' => $id_barrio,
            'id_usuario' => $id_usuario,
            'id_litros' => $id_litros
        ];

        $r = $this->deviceModel->contador($id_dispositivo);
        if($r){
            $this->deviceModel->actualizar($id_dispositivo, $dispositivoData);
            return redirect()->to(base_url('/'))->with('success_message', 'Error. El dispositivo ya existe.');
        } else {
            $this->deviceModel->add($dispositivoData);
            return redirect()->to(base_url('/'))->with('success_message', 'Dispositivo agregado exitosamente.');
        }
    }

    public function mostrarDatos($id_dispositivo){
        $datos['datos'] = $this->medicionModel->mostrarDatos($id_dispositivo);
        echo view('common/header');
        return view('datos', $datos);
    }

    public function guardar_id(){
        $id_dispositivo = $this->request->getPost('id_dispositivo');
        $data = ['id_dispositivo' => $id_dispositivo];
        $this->deviceModel->save($data);
        return redirect()->to('login')->with('error_message', 'ID guardado exitosamente');
    }
}