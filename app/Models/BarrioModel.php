<?php 
namespace App\Models;

use CodeIgniter\Model;

class BarrioModel extends Model{

    
    protected $table  = 'barrio';
    protected $primaryKey = 'id_barrio';

    protected $returnType       = 'array';

    protected $allowedFields = ['id_ciudad', 'barrio'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    public function add($barrio, $id_ciudad)
    {
        $result = $this->where(['barrio' => $barrio, 'id_ciudad' => $id_ciudad])->first();
        if ($result) {
            return $result['id_barrio'];
        } else {
            $this->save(['barrio' => $barrio, 'id_ciudad' => $id_ciudad]);
            return $this->insertID();
        }
    }
}