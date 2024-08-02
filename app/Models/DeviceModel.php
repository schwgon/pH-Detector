<?php 
namespace App\Models;

use CodeIgniter\Model;

class DeviceModel extends Model{

    
    protected $table  = 'dispositivo';
    protected $primaryKey = 'id_dispositivo';

    protected $returnType       = 'array';

    protected $allowedFields = ['id_dispositivo','id_usuario', 'nombre', 'id_barrio', 'id_calle','id_medicion_bomba'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    public function add($dispositivoData)
    {
       $this->insert($dispositivoData);
    }
}