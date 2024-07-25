<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Auth extends BaseController
{
    public function indexLogin()
    {
        echo view('common/header', ['session' => $this->session]);
        echo view('common/footer', ['session' => $this->session]);
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
                $this->session->set("user_id", $result->id_usuario);
                $this->session->set("user_name", $result->name);
                $this->session->set("user_email", $result->email);


                if ($result->id_permiso == 1) { // Verifica si el usuario tiene permisos de administrador
                    $this->session->set("is_admin", true);
                    echo view('common/header', $data); // Carga y muestra la vista 'common/header' pasando los datos de la sesion a la misma para su utilizacion.
                    return redirect()->to(base_url('panel_admin')); // Redirige al usuario a la pagina de administracion
                } else {
                    $this->session->set("is_admin", false);
                    return redirect()->to(base_url(''));
                }
            } else {
                echo 'Invalid password.';
                return view('login'); // en 43 y 47 "base_usrl()" y no "return" para que en otro controlador pueda traer en esa vista el header y el footer
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
        echo view('common/header', ['session' => $this->session]); // url en vez de return para llamar header y footer en otro contolador
        echo view('common/footer', ['session' => $this->session]);
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
            echo "user Registered successfully!!";
            // $this->session->set("welcome_message", "¡Bienvenido, " . $result->name . "!");
            return view('login');
        } else {
            echo "Error en el registro del usuario";
            return view('register');
        }
    }
    public function perfil()
    {
        $data['session'] = \Config\Services::session();
        $userModel = new UserModel();

        $userId = $this->session->get('user_id'); // Obtiene el ID del usuario de la sesión
        $userData = $userModel->find($userId); // Busca los datos del usuario en la base de datos

        if ($userData) {
            // Traduce el permiso del usuario a palabras
            if ($userData->id_permiso == 1) {
                $userData->id_permiso = 'Administrador';
            } else {
                $userData->id_permiso = 'Usuario';
            }

            $data['user'] = $userData; // Guarda los datos del usuario en el arreglo $data
            echo view('common/header', $data); // Carga y muestra la vista 'common/header'
            echo view('common/footer', $data);
            return view('perfil', $data); // Carga la vista 'perfil' pasando los datos del usuario
        }
    }
    public function editarPerfil()
    {
        $data['session'] = \Config\Services::session();
        $userModel = new UserModel();
        $userId = $this->session->get('user_id'); // Obtiene el ID del usuario de la sesión
        $userData = $userModel->find($userId); // Busca los datos del usuario en la base de datos

        if ($this->request->getMethod() == 'post') {
            $name = $this->request->getPost('name'); // Obtiene el valor del campo 'name' enviado por el formulario a traves del metodo POST
            $email = $this->request->getPost('email'); // Obtiene el valor del campo 'email' enviado por el formulario a traves del metodo POST
            $data = [ // Crea un arreglo con los datos del usuario
                'name' => $name,
                'email' => $email,
            ];
            $r = $userModel->update($userId, $data); // Actualiza los datos del usuario en la base de datos

            if ($r) { // Si el registro es exitoso
                session()->setFlashdata('success_message', 'Your profile has been updated successfully'); // Muestra un mensaje de exito
                return view('perfil'); // Redirige a la pagina del perfil
            }
        }
    }
}
