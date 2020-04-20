<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class preguntasViewModel extends Model
{
    protected $table = 'view_preguntas';
    protected $primaryKey = 'preguntaId';
    protected $allowedFields = ['pregunta','tema'];

}
