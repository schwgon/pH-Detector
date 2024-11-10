<?php

namespace App\Controllers;

use \App\Models\UserModel;
use \App\Models\EmailModel;
use \App\Models\CodigoModel;
use App\Controllers\BaseController;


class Auth extends BaseController
{
    public function indexLogin() {
        echo view('common/header');
        echo view('common/footer');
        return view('login');
    }

    public function do_login() {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $result = $userModel->asObject()->where('email', $email)->first();

        
        if ($result) { // Si se encuentra un usuario con el correo electronico dado
            if (password_verify($password, $result->password)) { // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
                $this->session->set("user_id", $result->id_usuario);
                $this->session->set("user_name", $result->name);
                $this->session->set("user_email", $result->email);
                if ($result->id_permiso == 1) {
                    $this->session->set("is_admin", true);
                    return redirect()->to(base_url('panel_admin'));
                } else {
                    $this->session->set("is_admin", false);
                    return redirect()->to(base_url(''));
                }
            } else {
                return redirect()->to(base_url('login'))->with('error_message', 'Contraseña Incorrecta.');
            }
        } else {
            return redirect()->to(base_url('login'))->with('error_message', 'Email Incorrecto.');
        }
    }


    public function logout() {
        $this->session->destroy(); // Destruye la sesion del usuario
        return redirect()->to(base_url('login')); // Redirige a la pagina de inicio de sesion
    }

    public function indexRegister() {
        echo view('common/header'); // url en vez de return para llamar header y footer en otro contolador
        echo view('common/footer');
        return view('register');
    }

    public function do_register() {
        $userModel = new UserModel();
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        if ($userModel->isEmailTaken($email)) { // Verifica si el correo electronico ya esta registrado en la base de datos
            return redirect()->to(base_url('register'))->with('error_message', 'El correo electrónico ya está registrado.');
        }
        $codigo = random_int(10000000, 99999999); // Genera un numero aleatorio de 8 digitos
        $password = password_hash($password, PASSWORD_BCRYPT);
        $data = [ // Crea un arreglo con los datos del usuario
            'name' => $name,
            'email' => $email,
            'password' => $password,
            //'codigo' => $codigo
        ];
        $r = $userModel->add($data);
        if ($r) { // Si el registro es exitoso
            return redirect()->to(base_url('login'))->with('error_message', 'Se ha registrado su cuenta. ¡Bienvenido!');
        } else {
            return redirect()->to(base_url('register'))->with('error_message', 'Error en el registro de su cuenta. Intentelo nuevamente');
        }
    }

    public function agregar_email() {
        echo view('common/header');
        echo view('common/footer');
        return view('RecuperarContra/agregar_email');
    }

    public function ObtenerCodigo() {
        $userModel = new UserModel();
        $emailModel = new EmailModel();
        $codigoModel = new CodigoModel();
        $email = $this->request->getPost('email');
        $codigo = random_int(10000000, 99999999);
        $id_usuario = $userModel->TraerIdUsuario($email);
        $data = ['codigo' => $codigo, 'id_usuario' => $id_usuario];
        $codigoModel->GuardarDatos($data);

        $dato = ['email' => $email];
        if ($emailModel->sendEmail($codigo, $email)) {
            echo view('common/header');
            echo view('common/footer');
            return view('RecuperarContra/ingresarCodigoContra', $dato);
        } else {
            return redirect()->to('agregar_email')->with('error_message', 'Error al enviar el codigo a su correo');
        }
    }

    public function verificarCodigo() {
        $userModel = new UserModel();
        $codigoModel = new CodigoModel();
        $codigo = $this->request->getPost('codigo');
        $email = $this->request->getPost('email');
        $contraseña = $this->request->getPost('contraseña');
        $id_usuario = $userModel->TraerIdUsuario($email);
        
        if ($codigoModel->VerificarCodigo($codigo, $id_usuario)) {
            $password = password_hash($contraseña, PASSWORD_BCRYPT);
            $data = ['password' => $password, 'email' => $email, 'codigo' => $codigo];
            $codigoModel->EliminarCodigo($id_usuario, $codigo);
            if ($userModel->ActualizarContra($data)) {
                return redirect()->to(base_url('login'))->with('error_message', 'Se ha modificado su contraseña correctamente');
            } else {
                return redirect()->to(base_url('ingresarCodigoContra'))->with('error_message', 'Error al cambiar la contraseña. Intentelo nuevamente');
            }
        }else{
            // return redirect()->to(base_url('login'))->with('error_message', 'Codigo incorrecto.');
            $data = ['email' => $email];
            echo view('common/header');
            echo view('common/footer');
            return view('RecuperarContra/ingresarCodigoContra', $data);
        }
    }
    
    public function ingresarCodigoContra() {
        echo view('common/header');
        echo view('common/footer');
        return view('RecuperarContra/ingresarCodigoContra');
    }
}