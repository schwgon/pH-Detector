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

    public function mostrarDatos($id_dispositivo = null){
        $query = $this->db->table('medicion')
            ->select('dispositivo.nombre, dispositivo.id_dispositivo, dispositivo.id_usuario, pais.pais, provincia.provincia, provincia.provincia, provincia.provincia, provincia.provincia')
            ->join('calle', 'dispositivo.id_calle = calle.id_calle')
            ->join('barrio', 'dispositivo.id_barrio = barrio.id_barrio')
            ->join('ciudad', 'barrio.id_ciudad = ciudad.id_ciudad')
            ->join('provincia', 'ciudad.id_provincia = provincia.id_provincia')
            ->join('pais', 'provincia.id_pais = pais.id_pais')
            ->where('dispositivo.id_usuario', $id_usuario)
            ->groupBy('dispositivo.id_dispositivo')
            ->get();
        return $query->getResultArray();
    }
}