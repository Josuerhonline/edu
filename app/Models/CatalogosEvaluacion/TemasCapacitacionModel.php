<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class TemasCapacitacionModel extends Model
{
    protected $table = 'eva_temas_capacitacion';
    protected $primaryKey = 'temaCapacitacionId';
    protected $allowedFields = ['tema','estado'];

}
