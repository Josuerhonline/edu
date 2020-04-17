<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class AreasEvaluacioModel extends Model
{
    protected $table = 'eva_areas_evaluacion';
    protected $primaryKey = 'areaEvaluacionId';
    protected $allowedFields = ['areaEvaluacion','estadoAreaEva'];

}
