<?php 
namespace App\Models;

use CodeIgniter\Model;

class CalleModel extends Model{
    protected $table  = 'calle';
    protected $primaryKey = 'id_calle';

    protected $returnType       = 'array';

    protected $allowedFields = ['calle'];

    public function add($calle)
    {
        $result = $this->where(['calle' => $calle])->first();
        if ($result) {
            return $result['id_calle'];
        } else {
            $this->save(['calle' => $calle]);
            return $this->insertID();
        }
    }
}