<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class preguntasModel extends Model
{
    protected $table = 'eva_preguntas';
    protected $primaryKey = 'preguntaId';
    protected $allowedFields = ['pregunta','temaCapacitacionId','estadoPregunta'];

}
