<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{

    protected $table  = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $returnType       = 'object';

    protected $allowedFields = ['name', 'email', 'password', 'id_permiso'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    public function isEmailTaken($email) {
        return $this->where('email', $email)->countAllResults() > 0;
    }

    // public function Test($mail, $color, $pelicula, $videojuego) {
    //     // return $this->where('email', $email)->countAllResults() > 0;
    //     return $this ->where('email', $mail)
    //         ->where('pregunta1', $color)
    //         ->where('pregunta2', $pelicula)
    //         ->where('pregunta3', $videojuego)
    //         ->countAllResults() > 0;
    // }

    // public function actualizarContrasena($email, $hashedPassword) {
    //     // Aquí debes implementar la lógica para actualizar la contraseña en la base de datos
    //     $data = ['password' => $hashedPassword];
    //     $this->where('email', $email)->set($data)->update();
    // }

    public function add($data){
        return $this->insert($data);
    }

    // public function Usuarios(){
    //     $query = $this->db->table('usuario')
    //         ->SELECT('id_usuario, name, email, password, permisos, created_at, updated_at')
    //         ->get();
    //     return $query->getResultArray();
    // }

    // public function deleteUsuario($id_usuario) {
    //     return $this->delete($id_usuario);
    // }
}