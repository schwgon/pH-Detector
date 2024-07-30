<?php 
namespace App\Models;

use CodeIgniter\Model;

class CiudadModel extends Model
{
    protected $table      = 'ciudad';
    protected $primaryKey = 'id_ciudad';
    
    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['ciudad', 'id_provincia'];

    // public function add($ciudad){
    //     return $this->insert($ciudad);
    // }

    public function add($ciudad)
    {
        $existingCiudad = $this->where('ciudad', $ciudad)->first();

        if ($existingCiudad) {
            // Si el país ya existe, retornar su ID
            return $existingCiudad['id_ciudad'];
        } else {
            // Si el país no existe, insertarlo y retornar su nuevo ID
            $this->insert(['ciudad' => $ciudad]);
            return $this->getInsertID();
        }
    }
}