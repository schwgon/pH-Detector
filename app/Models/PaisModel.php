<?php 
namespace App\Models;

use CodeIgniter\Model;

class PaisModel extends Model
{
    protected $table      = 'pais';
    protected $primaryKey = 'id_pais';
    
    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['pais'];

    // public function add($pais){
    //     return $this->insert($pais);
    // }

    public function add($pais)
    {
        $result = $this->where('pais', $pais)->first();
        if ($result) {
            return $result['id_pais'];
        } else {
            $this->save(['pais' => $pais]);
            return $this->insertID();
        }
    }

    public function add1($pais)
    {
        // Verificar si el país ya existe en la tabla
        $existingPais = $this->where('pais', $pais)->first();

        if ($existingPais) {
            // Si el país ya existe, retornar su ID
            return $existingPais['id_pais'];
        } else {
            // Si el país no existe, insertarlo y retornar su nuevo ID
            $this->insert(['pais' => $pais]);
            return $this->getInsertID();
        }
    }

    public function add2($pais){
        return $this->insert($pais);
    }
    
    public function deleteLugar($id_pais){
        // return $this->delete($id_lugar);
        $this->where('id_pais', $id_pais);
        $this->delete();
    }
}