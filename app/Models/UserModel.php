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

    public function isEmailTaken($email) // Metodo para verificar si un correo electronico ya esta registrado
    {
        return $this->where('email', $email)->countAllResults() > 0; // Cuenta los resultados con el correo dado y devuelve verdadero si es mayor a 0
    }

    public function Usuarios(){
        $query = $this->db->table('usuario')
            ->select('usuario.name, usuario.id_usuario, usuario.email, usuario.password, permiso.permiso')
            ->join('permiso', 'usuario.id_permiso = permiso.id_permiso') //esteeeeeeeeeeeeeeeeee
            ->join('usuario', 'permiso.id_usuario = usuario.id_usuario') //esteeeeeeeeeeeeeeeeee
            // ->join('calle', 'lugar.id_calle = calle.id_calle')
            // ->join('barrio', 'calle.id_barrio = barrio.id_barrio')
            // ->join('ciudad', 'barrio.id_ciudad = ciudad.id_ciudad')
            // ->join('provincia', 'ciudad.id_provincia = provincia.id_provincia')
            // ->join('pais', 'provincia.id_pais = pais.id_pais')
            // ->join('imagen', 'lugar.id_lugar = imagen.id_lugar', 'left')
            // ->join('precio', 'lugar.id_precio = precio.id_precio', 'left') // Agrega esta línea para unir la tabla de precios
            // ->join('etiqueta', 'lugar.id_lugar = etiqueta.id_lugar', 'left')
            // ->join('usuario', 'lugar.id_usuario = usuario.id_usuario', 'left')
            ->groupBy('name.id_usuario')
            ->get();
        return $query->getResultArray();
    }

    public function add($data) // Metodo para añadir un nuevo usuario
    {
        return $this->insert($data); // Inserta los datos del usuario en la base de datos y devuelve el resultado
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