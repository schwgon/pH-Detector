<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProvinciaModel extends Model
{
    protected $table      = 'Provincia';
    protected $primaryKey = 'id_provincia';
    
    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['provincia', 'id_pais'];
    
    // public function add($provincia){
    //     return $this->insert($provincia);
    // }

    public function add($provincia)
    {
        $existingProvincia = $this->where('provincia', $provincia)->first();

        if ($existingProvincia) {
            // Si el país ya existe, retornar su ID
            return $existingProvincia['id_provincia'];
        } else {
            // Si el país no existe, insertarlo y retornar su nuevo ID
            $this->insert(['provincia' => $provincia]);
            return $this->getInsertID();
        }
    }
}