<?php 
namespace App\Models;

use CodeIgniter\Model;

class MedicionModel extends Model{

    
    protected $table  = 'medicion';
    protected $primaryKey = 'id_medicion';

    protected $returnType       = 'array';

    protected $allowedFields = ['id_dispositivo', 'ph_value', 'fecha_hora'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    public function mostrarDatos($id_dispositivo){
        $query = $this->db->table('medicion')
            ->select('medicion.id_medicion, medicion.id_dispositivo, medicion.ph_value, medicion.fecha_hora')
            ->where('medicion.id_dispositivo', $id_dispositivo)
            ->groupBy('medicion.id_medicion')
            ->get();
        return $query->getResultArray();
    }
}