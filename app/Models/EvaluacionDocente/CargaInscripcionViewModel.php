<?php namespace App\Models\EvaluacionDocente;

use CodeIgniter\Model;

class CargaInscripcionViewModel extends Model
{
	protected $table = 'view_carga_inscripcion';
	protected $primaryKey = 'inscripcionDetalleId';
	protected $allowedFields = ['nombres','apellidos','nombrePersonalizado','fechaInscripcion','nombrePlan','estadoInstrumento'];

}
