<?php 
namespace App\Models;

use CodeIgniter\Model;

class MedicionModel extends Model{
    protected $table  = 'medicion';
    protected $primaryKey = 'id_medicion';
    protected $allowedFields = ['id_dispositivo', 'ph_value', 'id_tiempo'];

    public function mostrarDatos($id_dispositivo){
        $query = $this->db->table('medicion')
            ->select('medicion.id_medicion, medicion.id_dispositivo, medicion.ph_value, medicion.id_tiempo, tiempo.dia, tiempo.mes, tiempo.ano, tiempo.hora, tiempo.id_tiempo')
            ->join('tiempo', 'medicion.id_tiempo = tiempo.id_tiempo')
            ->where('medicion.id_dispositivo', $id_dispositivo)
            ->groupBy('medicion.id_medicion')
            ->get();
        return $query->getResultArray();
    }

    public function add($data){
        $this->save($data);
    }
}