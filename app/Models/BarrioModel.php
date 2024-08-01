<?php 
namespace App\Models;

use CodeIgniter\Model;

class BarrioModel extends Model
{
    protected $table      = 'barrio';
    protected $primaryKey = 'id_barrio';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['barrio', 'id_ciudad'];

    // public function add($barrio){
    //     return $this->insert($barrio);
    // }

    public function add($barrio, $id_ciudad)
    {
        $result = $this->where(['barrio' => $barrio, 'id_ciudad' => $id_ciudad])->first();
        if ($result) {
            return $result['id'];
        } else {
            $this->save(['barrio' => $barrio, 'id_ciudad' => $id_ciudad]);
            return $this->insertID();
        }
    }

    public function add($barrio)
    {
        $existingBarrio = $this->where('barrio', $barrio)->first();

        if ($existingBarrio) {
            // Si el país ya existe, retornar su ID
            return $existingBarrio['id_barrio'];
        } else {
            // Si el país no existe, insertarlo y retornar su nuevo ID
            $this->insert(['barrio' => $barrio]);
            return $this->getInsertID();
        }
    }
}