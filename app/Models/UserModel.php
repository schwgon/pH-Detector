<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{

    
    protected $table  = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['name', 'email', 'password', 'id_permiso'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    public function isEmailTaken($email) // Metodo para verificar si un correo electronico ya esta registrado
    {
        return $this->where('email', $email)->countAllResults() > 0; // Cuenta los resultados con el correo dado y devuelve verdadero si es mayor a 0
    }

    public function Usuarios(){
        $query = $this->db->table('usuario u')
            ->select('u.name, u.id_usuario, u.email, u.password, p.permiso')
            ->join('permiso p', 'u.id_permiso = p.id_permiso', 'left')
            ->groupBy('u.id_usuario')
            ->get();
        return $query->getResultArray();
    }

    public function updatee($id_usuario, $data){
        return $this->where('id_usuario', $id_usuario)->set($data)->update(); // Actualiza los datos del usuario en la base de datos y devuelve el resultado
    }
    
    public function add($data){
        return $this->asArray()->insert($data);
    }
    
    public function TraerIdUsuario($email){
        return $this->where('email', $email)->select('id_usuario')->first();
    }
    
    public function ActualizarContra($data) {
        $result = $this
            ->where('email', $data['email'])
            ->set('password', $data['password'])
            ->update();
        return $result !== false && $this->db->affectedRows() > 0; // Devuelve true si se actualizaron filas, false si no
    }
}