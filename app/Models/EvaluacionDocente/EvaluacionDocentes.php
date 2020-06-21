<?php namespace App\Models\EvaluacionDocente;

use CodeIgniter\Model;

class EvaluacionDocentes extends Model
{
	protected $table = 'eva_evaluacion_docentes';
	protected $primaryKey = 'evaluacionDocenteId';
	protected $allowedFields = ['personaId','aperEvaluacionId','fechaEvaluacion','observaciones'];

}
