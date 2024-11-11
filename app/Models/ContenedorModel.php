<?php 
namespace App\Models;

use CodeIgniter\Model;

class ContenedorModel extends Model{

    
    protected $table  = 'contenedor';
    protected $primaryKey = 'id_contenedor';

    protected $returnType       = 'array';

    protected $allowedFields = ['metros_cubicos'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    public function add($metros_cubicos)
    {
        $result = $this->where(['metros_cubicos' => $metros_cubicos])->first();
        if ($result) {
            return $result['id_contenedor'];
        } else {
            $this->save(['metros_cubicos' => $metros_cubicos]);
            return $this->insertID();
        }
    }
}