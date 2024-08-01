<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProvinciaModel extends Model{

    
    protected $table  = 'ciudad';
    protected $primaryKey = 'id_ciudad';

    protected $returnType       = 'object';

    protected $allowedFields = ['id_pais', 'ciudad'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

}