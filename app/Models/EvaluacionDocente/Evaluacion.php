<?php namespace App\Models\EvaluacionDocente;

use CodeIgniter\Model;

class Evaluacion extends Model
{
	protected $table = 'eva_evaluacion';
	protected $primaryKey = 'evaluacionId';
	protected $allowedFields = ['personaId','planMateriaId','aperEvaluacionId','fechaEvaluacion','observaciones','resultadoEvaluacion'];

}
