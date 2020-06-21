<?php namespace App\Models\EvaluacionDocente;

use CodeIgniter\Model;

class EvaluacionDetalle extends Model
{
	protected $table = 'eva_evaluacion_detalle';
	protected $primaryKey = 'evaluacionDetalleId';
	protected $allowedFields = ['evaluacionId','instrumentoDetalleId','valor'];

}
