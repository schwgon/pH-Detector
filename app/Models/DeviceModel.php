<?php 
namespace App\Models;

use CodeIgniter\Model;

class DeviceModel extends Model{

    
    protected $table  = 'dispositivo';
    protected $primaryKey = 'id_dispositivo';
    protected $returnType       = 'array';
    protected $allowedFields = ['id_dispositivo', 'id_usuario', 'nombre', 'ip', 'id_barrio', 'id_calle', 'id_medicion_bomba'];

    public function add($dispositivoData){
        $this->insert($dispositivoData);
    }

    public function save($data): bool{
        return parent::save($data);
    }

    public function Dispositivo($id_usuario = null){
        $query = $this->db->table('dispositivo')
            ->select('dispositivo.nombre, dispositivo.id_dispositivo, dispositivo.id_usuario, provincia.provincia, ciudad.ciudad, barrio.barrio, calle.calle')
            ->join('calle', 'dispositivo.id_calle = calle.id_calle')
            ->join('barrio', 'dispositivo.id_barrio = barrio.id_barrio')
            ->join('ciudad', 'barrio.id_ciudad = ciudad.id_ciudad')
            ->join('provincia', 'ciudad.id_provincia = provincia.id_provincia')
            ->where('dispositivo.id_usuario', $id_usuario)
            ->groupBy('dispositivo.id_dispositivo')
            ->get();
        return $query->getResultArray();
    }

    public function verificarID($dispositivo_id){
        return $this->where('id_dispositivo', $dispositivo_id)->countAllResults() > 0;
    }
    
    public function verificarIP($ip_address){
        return $this->where('ip', $ip_address)->countAllResults() > 0;
    }

    public function verificarUsuario($id_usuario){
        return $this->where('id_usuario', $id_usuario)->countAllResults() > 0;
    }

    public function actualizarIP($dispositivo_id, $datos){
        return $this->where('id_dispositivo', $dispositivo_id)->set($datos)->update();
    } 

    public function agregarID($dispositivo){
        $this->insert($dispositivo);
    } 

    public function agregarUsuario($dato, $dispositivo_id){
        $this->insert($dato)->where('id_dispositivo', $dispositivo_id);
    } 
}