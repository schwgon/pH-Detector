<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MedicionModel;
use App\Models\DeviceModel;
use App\Models\TiempoModel;

class ConexionController extends Controller{
 
    public function recibir_datos()
    {
        $dispositivo_id = $this->request->getPost('dispositivo_id');
        $ph_value = $this->request->getPost('ph_value');
        $ip_address = $this->request->getPost('ip_address');

        // Verifica que los datos no estén vacíos
        if (!$dispositivo_id || !$ph_value || !$ip_address) {
            return $this->response->setStatusCode(400)->setBody('Faltan datos');
        }

        $deviceModel = new DeviceModel();
        $medicionModel = new MedicionModel();
        $tiempoModel = new TiempoModel();

        $tiempo = [
            'dia' => date('d'),
            'mes' => date('m'),
            'ano' => date('Y'),
            'hora' => date('H:i')
        ];
        $id_tiempo = $tiempoModel->add($tiempo);
        
        $data = [
            'id_dispositivo' => $dispositivo_id,
            'ph_value' => $ph_value,
            'id_tiempo' => $id_tiempo
        ];

        $datos = ['ip' => $ip_address];

        // Verifica si el dispositivo ya esta registrado en la base de datos
        if (!$deviceModel->verificarID($dispositivo_id)) {
            $dispositivo = ['id_dispositivo' => $dispositivo_id];
            $deviceModel->agregarID($dispositivo);
            if (!$deviceModel->verificarIP($ip_address)) {
                $deviceModel->actualizarIP($dispositivo_id, $datos); // Actualiza la ip del dispositivo
                $medicionModel->add($data);
                return $this->response->setStatusCode(200)->setBody('Datos guardados correctamente');
            } else {
                $medicionModel->add($data);
                return $this->response->setStatusCode(200)->setBody('Datos guardados correctamente');
            }
        }else {
            if (!$deviceModel->verificarIP($ip_address)) {
                $deviceModel->actualizarIP($dispositivo_id, $datos); // Actualiza la ip del dispositivo
            } else {
                $data = [
                    'id_dispositivo' => $dispositivo_id,
                    'ph_value' => $ph_value,
                    'fecha_hora' => date('Y-m-d H:i:s')
                ];
                $medicionModel->add($data);
            }
            return $this->response->setStatusCode(200)->setBody('Datos guardados correctamente');
        }
    }

    // public function obtenerRangoPH() {
    //     $ph_minimo = 6.5; // Valores simulados
    //     $ph_maximo = 7.5;
    //     return $this->response->setStatusCode(200)->setBody("$ph_minimo $ph_maximo");
    // }
}