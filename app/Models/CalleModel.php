<?php 
namespace App\Models;

use CodeIgniter\Model;

class CalleModel extends Model{
    protected $table      = 'calle';
    protected $primaryKey = 'id_calle';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['calle', 'id_barrio'];

    // public function add($calle){
    //     return $this->insert($calle);
    // }

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

    public function add1($calle)
    {
        $existingCalle = $this->where('calle', $calle)->first();

        if ($existingCalle) {
            // Si el país ya existe, retornar su ID
            return $existingCalle['id_calle'];
        } else {
            // Si el país no existe, insertarlo y retornar su nuevo ID
            $this->insert(['calle' => $calle]);
            return $this->getInsertID();
        }
    }
}