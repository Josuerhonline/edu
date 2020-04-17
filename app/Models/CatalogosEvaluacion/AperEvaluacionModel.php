<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class AperEvaluacionModel extends Model
{
    protected $table = 'eva_aper_evaluacion';
    protected $primaryKey = 'aperEvaluacionId';
    protected $allowedFields = ['aperCicloId','instrumentoId','fechaInicio','fechaFin','estadoAperEva'];

}
