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

        // Conectar a la red de la NodeMCU
        $this->connectToNodeMCUNetwork();

        // Enviar los datos de la red principal a la NodeMCU
        $url = "http://192.168.4.1/configure";
        $data = [
            'ssid' => $ssid,
            'password' => $password,
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
            // echo "Error al enviar las credenciales.";
        } else {
            return redirect()->to('login')->with('error_message', 'Credenciales enviadas. Respuesta de NodeMCU: ' . $result);
            // echo "Credenciales enviadas. Respuesta de NodeMCU: " . $result;
        }
    }

    private function connectToNodeMCUNetwork()
    {
        // $cmd = 'netsh wlan connect name="NodeMCU_AP" key="12345678"';
        $cmd = 'netsh wlan add profile filename="C:\perfil_wifi.xml"';
        shell_exec($cmd);

        // Pausar para asegurar que la conexión esté establecida
        sleep(5);
        
        $cmd = 'netsh wlan connect name="NodeMCU_AP"';
        shell_exec($cmd);

        sleep(5);
    }
}
