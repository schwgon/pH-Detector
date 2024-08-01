<?php 
namespace App\Models;

use CodeIgniter\Model;

class CalleModel extends Model{

    
    protected $table  = 'calle';
    protected $primaryKey = 'id_calle';

    protected $returnType       = 'object';

    protected $allowedFields = ['calle'];

    protected $validationRules   = [];
    protected $validationMessages= [];
    protected $skipVaidation     = false;

}