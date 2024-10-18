<?php 
namespace App\Models;

use CodeIgniter\Model;

class CodigoModel extends Model{
    protected $table      = 'codigo';
    protected $primaryKey = 'id_codigo';
    protected $returnType = 'object';
    protected $allowedFields = ['codigo', 'id_usuario'];

    public function GuardarDatos($data){
        $this->insert($data);
    }
    
    public function VerificarCodigo($codigo, $id_usuario){
        $query = $this->db->table('codigo')
        ->where('id_usuario', $id_usuario)
        ->where('codigo', $codigo)
        ->get();
        return $query->getNumRows() > 0;
    }
    
    public function EliminarCodigo($id_usuario, $codigo){
        $query = $this->db->table('codigo')
        ->where('id_usuario', $id_usuario)
        ->where('codigo', $codigo)
        ->delete();
    }
}