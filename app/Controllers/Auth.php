<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Auth extends BaseController
{
    public function indexLogin()
    {
        echo view('common/header', ['session' => $this->session]);
        return view('login');
    }

    
    public function do_login() // Metodo para procesar el inicio de sesion
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $userModel->where('email', $email)->first(); // Busca un usuario en la base de datos con el correo electronico proporcionado

        if ($result) { // Si se encuentra un usuario con el correo electronico dado
            if (password_verify($password, $result->password)) { // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
                // Inicio de sesion exitoso
                $this->session->set("user_id", $result->id_usuario); // Guarda el ID del usuario en la sesion
                $this->session->set("user_name", $result->name); // Guarda el nombre del usuario en la sesion
                $this->session->set("user_email", $result->email); // Guarda el nombre del email en la sesion
                $this->session->set("user_name", $result->name);
                if ($result->id_permiso == 1) { // Verifica si el usuario tiene permisos de administrador
                    $this->session->set("is_admin", true);
                    return redirect()->to(base_url('panel_admin'));
                } else {
                    $this->session->set("is_admin", false);
                    return redirect()->to(base_url(''));
                }
            } else {
                echo 'Invalid password.';
                return view('login');
            }
        } else {
            echo 'Invalid email.';
            return view('login');
        }
    }


    public function logout() // Metodo para cerrar sesion
    {
        $this->session->destroy(); // Destruye la sesion del usuario
        return redirect()->to(base_url('login')); // Redirige a la pagina de inicio de sesion
    }

    public function indexRegister() // Metodo para cargar la vista del formulario de registro
    {
        echo view('common/header', ['session' => $this->session]); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        return view('register');
    }

    public function do_register() // Metodo para procesar el registro de un nuevo usuario
    {
        $userModel = new UserModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($userModel->isEmailTaken($email)) { // Verifica si el correo electronico ya esta registrado en la base de datos
            echo "El correo electrónico ya está registrado.";
            return view('register');
        }

        $password = password_hash($password, PASSWORD_BCRYPT);
        $data = [ // Crea un arreglo con los datos del usuario
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        $r = $userModel->add($data);

        if ($r) { // Si el registro es exitoso
            $data['success_message'] = "User Registered successfully!!"; // Muestra un mensaje de exito
            return view('login'); // Redirige a la pagina de inicio de sesion
        } else {
            echo "Error en el registro del usuario";
            return view('register');
        }
    }
    public function perfil(){
        $data['session'] = \Config\Services::session();
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        return view('perfil');
    }
    public function editarPerfil(){
        $data['session'] = \Config\Services::session();
        echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
        return view('editarPerfil');
    }
}
