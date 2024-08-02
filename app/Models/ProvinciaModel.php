<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProvinciaModel extends Model{

    
    protected $table  = 'provincia';
    protected $primaryKey = 'id_provincia';

    protected $returnType       = 'array';

    protected $allowedFields = ['provincia'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    public function add($provincia)
    {
        $result = $this->where(['provincia' => $provincia])->first();
        if ($result) {
            return $result['id_provincia'];
        } else {
            $this->save(['provincia' => $provincia]);
            return $this->insertID();
        }
    }

}