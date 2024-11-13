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

    // Crear registro de tiempo
    $tiempo = [
        'dia' => date('d'),
        'mes' => date('m'),
        'ano' => date('Y'),
        'hora' => date('H:i')
    ];
    
    // Insertar tiempo y obtener ID
    $id_tiempo = $tiempoModel->add($tiempo);

    // Preparar datos de medición
    $data = [
        'id_dispositivo' => $dispositivo_id,
        'ph_value' => $ph_value,
        'id_tiempo' => $id_tiempo
    ];

    // Verificar si el dispositivo existe
    if (!$deviceModel->verificarID($dispositivo_id)) {
        // Dispositivo nuevo
        $dispositivo = ['id_dispositivo' => $dispositivo_id];
        $deviceModel->agregarID($dispositivo);
    }

    // Actualizar IP si es necesario
    if (!$deviceModel->verificarIP($ip_address)) {
        $deviceModel->actualizarIP($dispositivo_id, ['ip' => $ip_address]);
    }

    // Guardar la medición
    if ($medicionModel->add($data)) {
        return $this->response->setStatusCode(200)->setBody('Datos guardados correctamente');
    } else {
        return $this->response->setStatusCode(500)->setBody('Error al guardar la medición');
    }
}

    // public function obtenerRangoPH() {
    //     $ph_minimo = 6.5; // Valores simulados
    //     $ph_maximo = 7.5;
    //     return $this->response->setStatusCode(200)->setBody("$ph_minimo $ph_maximo");
    // }
}