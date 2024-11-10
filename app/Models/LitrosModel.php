<?php 
namespace App\Models;

use CodeIgniter\Model;

class LitrosModel extends Model{
    protected $table      = 'litros';
    protected $primaryKey = 'id_litros';
    protected $allowedFields = ['litros'];

    public function add($litros){        
        $result = $this->where('litros', $litros)->first();
        if ($result) {
            return $result['id_litros'];
        } else {
            $this->save(['litros' => $litros]);
            return $this->insertID();
        }

    }
}