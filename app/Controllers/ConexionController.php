<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MedicionModel;
use App\Models\DeviceModel;

class ConexionController extends Controller{

    public function enviarDatos() {
        $url = 'http://192.168.1.1/recibir'; // URL de la NodeMCU
        $datos = array('mensaje' => 'Hola NodeMCU!'); // Datos a enviar
    
        // Usar CURL para enviar datos a la NodeMCU
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
    
        $response = curl_exec($ch);
        curl_close($ch);
    
        echo "Respuesta de NodeMCU: " . $response; // Mostrar la respuesta
        var_dump($response);
        
        echo view('common/header');
        echo view('common/footer');
        return view('inicio');
    }
    

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

        // $id_usuario = $this->session->get("user_id");

        // Verifica si el dispositivo ya esta registrado en la base de datos
        if (!$deviceModel->verificarID($dispositivo_id)) {
            $dispositivo = ['id_dispositivo' => $dispositivo_id];
            $deviceModel->agregarID($dispositivo);
            if (!$deviceModel->verificarIP($ip_address)) {
                $datos = ['ip' => $ip_address];
                $deviceModel->actualizarIP($dispositivo_id, $datos); // Actualiza la ip del dispositivo
                if (!$deviceModel->verificarUsuario($id_usuario)) {
                    $dato = ['id_usuario' => $id_usuario];
                    $deviceModel->agregarUsuario($dispositivo_id, $dato); // Actualiza la ip del dispositivo
                } else {
                    // hacer consulta para agregar valores de pH constantemente;
                    $data = [
                        'id_dispositivo' => $dispositivo_id,
                        'ph_value' => $ph_value,
                        'fecha_hora' => date('Y-m-d H:i:s')
                    ];
                    $medicionModel->add($data);
                    return $this->response->setStatusCode(200)->setBody('Datos guardados correctamente');
                }
            } else {
                // hacer consulta para agregar valores de pH constantemente;
                $data = [
                    'id_dispositivo' => $dispositivo_id,
                    'ph_value' => $ph_value,
                    'fecha_hora' => date('Y-m-d H:i:s')
                ];
                $medicionModel->add($data);
                return $this->response->setStatusCode(200)->setBody('Datos guardados correctamente');
            }
        }else {
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
            return $this->response->setStatusCode(200)->setBody('Datos guardados correctamente');
        }
    }

    public function obtenerRangoPH() {
        $ph_minimo = 6.5; // Valores simulados
        $ph_maximo = 7.5;
        return $this->response->setStatusCode(200)->setBody("$ph_minimo $ph_maximo");
    }
}