<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class PromedioFacultadModel extends Model
{
	protected $table = 'view_promedio_facultad';
	protected $allowedFields = ['promedio','facultad','areaEvaluacionId'];

}
