<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class InscripcionViewModel extends Model
{
    protected $table = 'view_inscripcion';
    protected $primaryKey = 'inscripcionDetalleId';
    protected $allowedFields = ['nombres','apellidos','nombrePersonalizado','fechaInscripcion','nombrePlan','estadoInstrumento'];

}
