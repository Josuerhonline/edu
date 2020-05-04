<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class InscripcionModel extends Model
{
    protected $table = 'eva_inscripcion';
    protected $primaryKey = 'inscripcionId';
    protected $allowedFields = ['personaId','aperCicloId','fechaInscripcion','estado'];

}
