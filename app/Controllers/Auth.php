<?php

namespace App\Controllers;
use \App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct() // Constructor: Inicializa el controlador y carga la biblioteca de sesión.
    {
        $this->session = \Config\Services::session();
    }

    public function indexLogin()  // Método para cargar la vista del formulario de inicio de sesión.
    {
        $data['session'] = \Config\Services::session();
        echo view('login');
    }

    public function do_login() 
    {
        $userModel = new userModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $userModel->where('email',$email)->first();

        if($result){
            if (password_verify($password, $result->password)){
                // Inicio de sesión exitoso
                $this->session->set("user_id", $result->id_usuario);
                $this->session->set("user_name", $result->name);
                // Verificar si el usuario es administrador
                if ($result->permisos == 1) {
                     //El usuario es administrador
                    $this->session->set("is_admin", true);
                    return redirect()->to(base_url('admin'));
                } else {
                     //El usuario no es administrador
                    $this->session->set("is_admin", false);
                    return redirect()->to(base_url(''));
                }
            } 
            else{
                echo 'Invalid email or password.';
            }
        } 
        else{   
            echo 'Invalid email or password';
        }
    
        
}
    

    public function logout() {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }

    public function indexRegister()
    {
        $data['session'] = \Config\Services::session();
        echo view('register');
    }
    
    public function do_register() {
        $userModel = new UserModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $device = $this->request->getPost('device');

        if ($userModel->isEmailTaken($email)) {                // Verificar si el correo electrónico ya está registrado
            echo "El correo electrónico ya está registrado.";
            return redirect()->to('register');;
        }

        
        $password = password_hash("$password", PASSWORD_BCRYPT);
        $data = [
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'id_dispositivo' => $device
        ];
        
        $r = $userModel->add($data);

        if ( $r ) {
            
            return redirect()->to('login');
            echo "user Registered sucesfully!!";
        }
        else {
            echo "Error en el registro del usuario";
        }
        return redirect()->to('register');
    }

    public function VerificacionForm()
    {
        $data['session'] = \Config\Services::session();
        echo view('common/header', $data);
        echo view('verifuser');
        echo view('common/footer');
    }
}