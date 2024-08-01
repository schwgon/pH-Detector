<?php 
namespace App\Models;

use CodeIgniter\Model;

class BarrioModel extends Model{

    
    protected $table  = 'barrio';
    protected $primaryKey = 'id_barrio';

    protected $returnType       = 'object';

    protected $allowedFields = ['id_provincia', 'barrio'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

}