<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Auth extends BaseController // Declara la clase Auth que extiende BaseController para heredar sus metodos y propiedades
{
    public function __construct() // Constructor: se ejecuta automaticamente al crear una instancia de la clase. Carga la biblioteca de sesion
    {
        $this->session = \Config\Services::session(); // Inicializa la sesion utilizando el servicio de configuracion
    }

    public function indexLogin()  // Metodo para cargar la vista del formulario de inicio de sesion
    {
        $data['session'] = \Config\Services::session(); // Guarda la sesion actual en el arreglo $data
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('login');
        
    }

    public function do_login() // Metodo para procesar el inicio de sesion
    {
        $data['session'] = \Config\Services::session();
        $userModel = new UserModel(); // Crea una instancia del modelo de usuario para interactuar con la base de datos

        $email = $this->request->getPost('email'); // Obtiene el valor del campo 'email' enviado por el formulario a traves del metodo POST
        $password = $this->request->getPost('password'); // Obtiene el valor del campo 'password' enviado por el formulario a traves del metodo POST

        $result = $userModel->where('email', $email)->first(); // Busca un usuario en la base de datos con el correo electronico proporcionado

        if ($result) { // Si se encuentra un usuario con el correo electronico dado
            if (password_verify($password, $result->password)) { // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
                // Inicio de sesion exitoso
                $this->session->set("user_id", $result->id_usuario); // Guarda el ID del usuario en la sesion
                $this->session->set("user_name", $result->name); // Guarda el nombre del usuario en la sesion
                $this->session->set("user_email", $result->email); // Guarda el nombre del email en la sesion


                if ($result->id_permiso == 1) { // Verifica si el usuario tiene permisos de administrador
                    $this->session->set("is_admin", true);
                    echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
                    return view('admin'); // Redirige al usuario a la pagina de administracion
                } else {
                    $this->session->set("is_admin", false); // Establece el indicador de no administrador en la sesion
                    return redirect()->to(base_url('')); // Redirige al usuario a la pagina principal
                }
            } else {
                session()->setFlashdata('password_message', 'Password is incorrect'); // Muestra un mensaje de error si la contraseña es incorrecta
                echo view('common/header', $data);
                echo view('common/footer', $data);
                return view('login'); // Carga la vista login
            }
        } else {
            session()->setFlashdata('user_message', 'User not found'); // Muestra un mensaje de error si no se encuentra el usuario
            echo view('common/header', $data);
            echo view('common/footer', $data);
            return view('login'); // Carga la vista login
        }
    }


    public function logout() // Metodo para cerrar sesion
    {
        $this->session->destroy(); // Destruye la sesion del usuario
        return redirect()->to(base_url('login')); // Redirige a la pagina de inicio de sesion
    }

    public function indexRegister() // Metodo para cargar la vista del formulario de registro
    {
        $data['session'] = \Config\Services::session();
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('register');
       
    }

    public function do_register() // Metodo para procesar el registro de un nuevo usuario
    {
        $data['session'] = \Config\Services::session();
        $userModel = new UserModel(); // Crea una instancia del modelo de usuario para interactuar con la base de datos

        $name = $this->request->getPost('name'); // Obtiene el valor del campo 'name' enviado por el formulario a traves del metodo POST
        $email = $this->request->getPost('email'); // Obtiene el valor del campo 'email' enviado por el formulario a traves del metodo POST
        $password = $this->request->getPost('password'); // Obtiene el valor del campo 'password' enviado por el formulario a traves del metodo POST

        if ($userModel->isEmailTaken($email)) { // Verifica si el correo electronico ya esta registrado en la base de datos
            session()->setFlashdata('correo_message', 'Email already registered'); // Muestra un mensaje de error si el correo ya esta en uso
            echo view('common/header', $data);
            echo view('common/footer', $data);
            return view('register'); // Redirige a la pagina de registro
        }

        $password = password_hash($password, PASSWORD_BCRYPT); // Encripta la contraseña utilizando el algoritmo BCRYPT
        $data = [ // Crea un arreglo con los datos del usuario
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        $r = $userModel->add($data); // Añade el nuevo usuario a la base de datos

        if ($r) { // Si el registro es exitoso
            session()->setFlashdata('success_message', 'You have successfully registered'); // Muestra un mensaje de exito
            echo view('common/header', $data);
            echo view('common/footer', $data);
            return view('login'); // Redirige a la pagina de inicio de sesion
        }
    }
    public function perfil(){
        $data['session'] = \Config\Services::session();
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('perfil');
    }
    public function editarPerfil(){
        $data['session'] = \Config\Services::session();
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        echo view('common/footer', $data);
        return view('editarPerfil');
    }
}
