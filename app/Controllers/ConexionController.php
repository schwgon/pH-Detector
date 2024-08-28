<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\MedicionModel;
use App\Models\DeviceModel;

class ConexionController extends Controller{

    public function recibir_datos()
    {
        $dispositivo_id = $this->request->getPost('dispositivo_id');
        $ph_value = $this->request->getPost('ph_value');
        $ip_address = $this->request->getPost('ip_address');

        $deviceModel = new DeviceModel();
        $medicionModel = new MedicionModel();

        // Verifica si el dispositivo ya esta registrado en la base de datos
        if ($deviceModel->verificarID($dispositivo_id)) {
            // Verifica si la ip no esta registrada en la base de datos
            if (!$deviceModel->verificarIP($ip_address)) {
                $datos = ['ip' => $ip_address];
                $deviceModel->actualizarIP($dispositivo_id, $datos); // Actualiza la ip del dispositivo
            } else {
                // hacer consulta para agregar valores de pH constantemente;
                $data = [
                    'id_dispositivo' => $dispositivo_id,
                    'ph_value' => $ph_value,
                    'fecha_hora' => date('Y-m-d H:i:s')
                ];
                $medicionModel->add($data);
            }
        }
    }
}