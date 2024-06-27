<?php

namespace App\Controllers;
use \App\Models\PaisModel;
use \App\Models\ProvinciaModel;
use \App\Models\CiudadModel;
use \App\Models\BarrioModel;
use \App\Models\CalleModel;
use \App\Models\DispositivoModel;


class Dispositivo extends BaseController
{
    public function index() // Metodo para cargar la pagina principal
    {
        echo view('common/header', ['session' => $this->session]);
        echo view('common/footer', ['session' => $this->session]);
        return view('addDevice');
    }

    public function guardar()
    {
        $paisModel = new PaisModel();
        $provinciaModel = new ProvinciaModel();
        $ciudadModel = new CiudadModel();
        $barrioModel = new BarrioModel();
        $calleModel = new CalleModel();
        $dispositivoModel = new DispositivoModel();

        $nombre = $this->request->getPost('name');
        $id_dispositivo = $this->request->getPost('id');
        $pais = $this->request->getPost('pais');
        $provincia = $this->request->getPost('provincia');
        $ciudad = $this->request->getPost('ciudad');
        $barrio = $this->request->getPost('barrio');
        $calle = $this->request->getPost('calle');
        
        $id_usuario = $this->session->get('user_id');            

        // Insertar datos en las tablas relacionadas, de la Ubicacion
        // $pais = (['pais' => $pais]);
        // $paisModel->add($pais);
        // $id_pais = $paisModel->insertID();

        $id_pais = $paisModel->add(['pais' => $pais]);
        
        // $provincia = (['provincia' => $provincia, 'id_pais' => $id_pais]);
        // $provinciaModel->add($provincia);
        // $id_provincia = $provinciaModel->insertID();

        $id_provincia = $provinciaModel->add(['provincia' => $provincia]);

        // $ciudad = (['ciudad' => $ciudad, 'id_provincia' => $id_provincia]);
        // $ciudadModel->add($ciudad);
        // $id_ciudad = $ciudadModel->insertID();

        $id_ciudad = $ciudadModel->add(['ciudad' => $ciudad]);

        // $barrio = (['barrio' => $barrio, 'id_ciudad' => $id_ciudad]);
        // $barrioModel->add($barrio);
        // $id_barrio = $barrioModel->insertID();

        $id_barrio = $barrioModel->add(['barrio' => $barrio]);

        // $calle = (['calle' => $calle, 'id_barrio' => $id_barrio]);
        // $calleModel->add($calle);
        // $id_calle = $calleModel->insertID();

        $id_calle = $calleModel->add(['calle' => $calle]);

        // $dispositivo = ([
        //     'nombre' => $nombre,
        //     'id_dispositivo' => $id_dispositivo,
        //     'id_usuario' => $id_usuario,
        //     'id_barrio' => $id_barrio,
        //     'id_calle' => $id_calle
        // ]);
        // $lugarModel->add($lugar);
        // $id_lugar = $lugarModel->insertID();

        $id_dispositivo = $dispositivoModel->add([
            'nombre' => $nombre, 
            'id_dispositivo' => $id_dispositivo, 
            'id_usuario' => $id_usuario, 
            'id_barrio' => $id_barrio, 
            'id_calle' => $id_calle
        ]);

        //$id_lugar = $lugarModel->insertID();  // Obtener el ID del lugar insertado

        // Comprueba si la sesión está activa y si 'user_id' está disponible
        if ($this->session->has('user_id')) {
            return redirect()->to(base_url(''));
        } else {
            return redirect()->to(base_url('login'));
        }
    }
}