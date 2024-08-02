<?php 
namespace App\Models;

use CodeIgniter\Model;

class CiudadModel extends Model{

    
    protected $table  = 'ciudad';
    protected $primaryKey = 'id_ciudad';

    protected $returnType       = 'array';
    
    protected $allowedFields = ['id_provincia', 'ciudad'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    public function add($ciudad, $id_provincia)
    {
        $result = $this->where(['ciudad' => $ciudad, 'id_provincia' => $id_provincia])->first();
        if ($result) {
            return $result['id_ciudad'];
        } else {
            $this->save(['ciudad' => $ciudad, 'id_provincia' => $id_provincia]);
            return $this->insertID();
        }
    }
}