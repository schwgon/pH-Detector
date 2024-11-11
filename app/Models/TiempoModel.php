<?php 
namespace App\Models;

use CodeIgniter\Model;

class TiempoModel extends Model{
    protected $table      = 'tiempo';
    protected $primaryKey = 'id_tiempo';
    protected $returnType       = 'array';
    protected $allowedFields = ['dia', 'mes', 'ano', 'hora'];

    public function add($tiempo){
        $this->insert($tiempo);
        return $this->insertID();
    }
}