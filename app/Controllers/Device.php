<?php

namespace App\Controllers;
use \App\Models\PaisModel;
use \App\Models\ProvinciaModel;
use \App\Models\CiudadModel;
use \App\Models\BarrioModel;
use \App\Models\CalleModel;
use \App\Models\DispositivoModel;

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
        $userModel = new UserModel();

        $name = $this->request->getPost('name');
        $Id_device = $this->request->getPost('Id_device');
        $country = $this->request->getPost('country');
        $province = $this->request->getPost('province');
        $city = $this->request->getPost('city');
        $address = $this->request->getPost('address');
        $id_usuario = $this->session->get('user_id');

        $paisModel = new PaisModel();
        $provinciaModel = new ProvinciaModel();
        $ciudadModel = new CiudadModel();
        $barrioModel = new BarrioModel();
        $calleModel = new CalleModel();
        $dispositivoModel = new DispositivoModel();

         // Verificar y obtener el ID del país
         $id_pais = $paisModel->add($pais);

         // Verificar y obtener el ID de la provincia
         $id_provincia = $provinciaModel->add($provincia, $id_pais);
 
         // Verificar y obtener el ID de la ciudad
         $id_ciudad = $ciudadModel->add($ciudad, $id_provincia);
 
         // Verificar y obtener el ID del barrio
         $id_barrio = $barrioModel->add($barrio, $id_ciudad);
 
         // Verificar y obtener el ID de la calle
         $id_calle = $calleModel->add($calle, $id_barrio);
 
         // Agregar el dispositivo
         $dispositivoData = [
             'name' => $name,
             'Id_device' => $Id_device,
             'id_calle' => $id_calle,
             'moneda' => $moneda,
             'precio' => $precio
         ];
         $dispositivoModel->add($dispositivoData);
 
         return redirect()->to(base_url('device'))->with('success_message', 'Dispositivo agregado exitosamente.');

        // Insertar datos en las tablas relacionadas, de la Ubicacion
        $pais = (['pais' => $pais]);
        $paisModel->add($pais);
        $id_pais = $paisModel->insertID();
        
        $provincia = (['provincia' => $provincia, 'id_pais' => $id_pais]);
        $provinciaModel->add($provincia);
        $id_provincia = $provinciaModel->insertID();
        
        $ciudad = (['ciudad' => $ciudad, 'id_provincia' => $id_provincia]);
        $ciudadModel->add($ciudad);
        $id_ciudad = $ciudadModel->insertID();
        
        $barrio = (['barrio' => $barrio, 'id_ciudad' => $id_ciudad]);
        $barrioModel->add($barrio);
        $id_barrio = $barrioModel->insertID();
        
        $calle = (['calle' => $calle, 'id_barrio' => $id_barrio]);
        $calleModel->add($calle);
        $id_calle = $calleModel->insertID();
        
        $precio = (['moneda' => $moneda, 'precio' => $precio]);
        $precioModel->add($precio);
        $id_precio = $precioModel->insertID();


        // if ($userModel->isEmailTaken($email)) { // Verifica si el correo electronico ya esta registrado en la base de datos
        //     return redirect()->to(base_url('register'))->with('error_message', 'El correo electrónico ya está registrado.');
        // }

        // $password = password_hash($password, PASSWORD_BCRYPT);
        // $data = [ // Crea un arreglo con los datos del usuario
        //     'name' => $name,
        //     'email' => $email,
        //     'password' => $password
        // ];
        // $r = $userModel->add($data);

        // if ($r) { // Si el registro es exitoso
        //     echo "user Registered successfully!!";
        //     //  $this->session->set("error_message", "¡Bienvenido, " . $r->name . "!");
        //     return view('login');
        // } else {
        //     echo "Error en el registro del usuario";
        //     return view('register');
        // }
    }
}