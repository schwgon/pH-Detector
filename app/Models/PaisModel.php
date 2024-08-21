<?php 
namespace App\Models;

use CodeIgniter\Model;

class PaisModel extends Model
{
    protected $table      = 'pais';
    protected $primaryKey = 'id_pais';
    protected $returnType     = 'array';    
    protected $allowedFields = ['pais'];

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
}