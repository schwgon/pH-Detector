<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{

    
    protected $table  = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $returnType       = 'object';

    protected $allowedFields = ['name', 'email', 'password', 'id_permiso', 'codigo'];

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
    
    public function add($data) // Metodo para añadir un nuevo usuario
    {
        return $this->insert($data); // Inserta los datos del usuario en la base de datos y devuelve el resultado
    }
    
    public function traerCodico($email)
    {
        return $this->where('email', $email)->select('codigo')->get()->getFirstRow();
    }
    
    public function VerificarCodigo($codigo, $email)
    {
        $query = $this->db->table('usuario')
            ->select('codigo')
            ->where('email', $email)
            ->where('codigo', $codigo)
            ->get();
        return $query->getNumRows() > 0;
    }
    
    public function ActualizarContra($data) {
        // Intenta actualizar la contraseña
        $result = $this
            ->where('email', $data['email'])
            ->where('codigo', $data['codigo'])
            ->set('password', $data['password']) // Actualiza solo el campo 'password'
            ->update();
        // Devuelve true si se actualizaron filas, false si no
        return $result !== false && $this->db->affectedRows() > 0;
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