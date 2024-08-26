<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class NetworkController extends Controller
{
    public function index()
    {
        return view('network_config');
    }

    public function sendCredentials()
    {
        $ssid = $this->request->getPost('ssid');
        $password = $this->request->getPost('password');

        // Obtener la dirección IP de la PC
        $pc_ip = $this->getPCIPAddress();

        // Conectar a la red de la NodeMCU
        $this->connectToNodeMCUNetwork();

        // Enviar los datos de la red principal a la NodeMCU
        $url = "http://192.168.4.1/configure";
        $data = [
            'ssid' => $ssid,
            'password' => $password,
            'pc_ip' => $pc_ip
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            return redirect()->to('login')->with('error_message', 'Error al enviar las credenciales.');
        } else {
            return redirect()->to('login')->with('error_message', 'Credenciales enviadas. Respuesta de NodeMCU: ' . $result);
        }
    }

    private function connectToNodeMCUNetwork()
    {
        // Conectar a la red de la NodeMCU
        $cmd = 'netsh wlan add profile filename="C:\perfil_wifi.xml"';
        shell_exec($cmd);

        // Pausar para asegurar que la conexión esté establecida
        sleep(5);
        
        $cmd = 'netsh wlan connect name="NodeMCU_AP"';
        shell_exec($cmd);

        sleep(5);
    }

    private function getPCIPAddress()
    {
        // Obtener la dirección IP de la PC ejecutando un comando del sistema
        $output = shell_exec('ipconfig');

        // Extraer la dirección IP usando una expresión regular
        if (preg_match('/IPv4 Address.*?:\s*([0-9\.]+)/', $output, $matches)) {
            return $matches[1];
        }

        return '127.0.0.1';  // Retornar localhost si no se puede encontrar la IP
    }
}
