<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Email\Email;

class EmailModel extends Model
{
    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function sendEmail($codigo, $email)
    {
        $this->email->setTo($email);
        $this->email->setFrom('gasparschwartz@alumnos.itr3.edu.ar', 'pH-Detector');
        $this->email->setSubject('Número desde el formulario');
        $this->email->setMessage("El código de recueración proporcionado es: $codigo");

        return $this->email->send();
    }
}