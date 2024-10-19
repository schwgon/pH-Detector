<?php 
namespace App\Models;

use CodeIgniter\Model;

class DeviceModel extends Model {

    protected $table = 'dispositivo';
    protected $primaryKey = 'id_dispositivo';

    protected $returnType = 'array';

    protected $allowedFields = ['id_dispositivo', 'id_usuario', 'nombre', 'ip', 'id_barrio', 'id_calle', 'id_medicion_bomba'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    // Método para agregar un dispositivo
    public function add($dispositivoData)
    {
        $this->insert($dispositivoData);
    }

    // Método para obtener todos los dispositivos
    public function getAllDevices()
    {
        return $this->findAll();
    }

    // Método para actualizar un dispositivo
    public function updateDevice($id_dispositivo, $dispositivoData)
    {
        return $this->update($id_dispositivo, $dispositivoData);
    }

    // Método para eliminar un dispositivo
    public function deleteDevice($id_dispositivo)
    {
        return $this->delete($id_dispositivo);
    }

    // Método para obtener dispositivos por usuario
    public function getDevicesByUser($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->findAll();
    }
}
