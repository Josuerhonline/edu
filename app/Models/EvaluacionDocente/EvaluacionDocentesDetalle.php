<?php namespace App\Models\EvaluacionDocente;

use CodeIgniter\Model;

class EvaluacionDocentesDetalle extends Model
{
	protected $table = 'eva_evaluacion_docentes_detalle';
	protected $primaryKey = 'evaluacionDocentesDetaId';
	protected $allowedFields = ['evaluacionDocenteId','instrumentoDetalleId','valor'];

}
