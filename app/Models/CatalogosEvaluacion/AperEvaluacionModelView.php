<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class AperEvaluacionModelView extends Model
{
    protected $table = 'view_aper_evaluacion';
    protected $primaryKey = 'aperEvaluacionId';
    protected $allowedFields = ['aperCicloId','instrumentoId','fechaInicio','fechaFin','estadoAperEva'];

}
