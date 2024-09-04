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

        // Verifica que los datos no estén vacíos
        if (!$dispositivo_id || !$ph_value || !$ip_address) {
            return $this->response->setStatusCode(400)->setBody('Faltan datos');
        }

        $deviceModel = new DeviceModel();
        $medicionModel = new MedicionModel();

        // Verifica si el dispositivo ya esta registrado en la base de datos
        if (!$deviceModel->verificarID($dispositivo_id)) {
            $dispositivo = ['id_dispositivo' => $dispositivo_id            ];
            $deviceModel->agregarID($dispositivo); // Actualiza la ip del dispositivo
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
        } else {
            return $this->response->setStatusCode(404)->setBody('Dispositivo no encontrado');
        }
        return $this->response->setStatusCode(200)->setBody('Datos recibidos correctamente');
    }
}