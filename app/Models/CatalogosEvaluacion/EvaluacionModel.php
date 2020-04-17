<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class EvaluacionModel extends Model
{
    protected $table = 'eva_evaluacion';
    protected $primaryKey = 'evaluacionId';
    protected $allowedFields = ['personaId','planMateriaId','aperEvaluacionId','fechaEvaluacion','observaciones'];

}
