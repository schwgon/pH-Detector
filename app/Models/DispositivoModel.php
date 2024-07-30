<?php 
namespace App\Models;

use CodeIgniter\Model;

class DispositivoModel extends Model
{
    protected $table      = 'dispositivo';
    protected $primaryKey = 'id_dispositivo';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_usuario', 'nombre', 'id_barrio', 'id_calle', 'id_medicion_bomba'];

    // public function add($barrio){
    //     return $this->insert($barrio);
    // }

    public function add($dispositivo)
    {
        $existingDispositivo = $this->where('id_dispositivo', $dispositivo['id_dispositivo'])->first();

        if ($existingDispositivo) {
            // Si el país ya existe, retornar su ID
            return $existingDispositivo['id_dispositivo'];
        } else {
            // Si el país no existe, insertarlo y retornar su nuevo ID
            $this->insert([
                'id_dispositivo' => $dispositivo['id_dispositivo'],
                'id_usuario' => $dispositivo['id_usuario'],
                'nombre' => $dispositivo['nombre'],
                'id_barrio' => $dispositivo['id_barrio'],
                'id_calle' => $dispositivo['id_calle']
            ]);
            return $this->getInsertID();
        }
    }
}