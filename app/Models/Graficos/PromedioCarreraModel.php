<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class PromedioCarreraModel extends Model
{
	protected $table = 'view_promedio_carrera';
	protected $allowedFields = ['promedio','facultad','areaEvaluacionId'];

}
