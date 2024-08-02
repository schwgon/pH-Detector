<?php 
namespace App\Models;

use CodeIgniter\Model;

class PaisModel extends Model{

    
    protected $table  = 'pais';
    protected $primaryKey = 'id_pais';

    protected $returnType       = 'object';

    protected $allowedFields = ['pais'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

    
}