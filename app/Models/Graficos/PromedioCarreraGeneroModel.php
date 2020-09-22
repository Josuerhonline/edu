<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class PromedioCarreraGeneroModel extends Model
{
	protected $table = 'view_promedio_carrera_genero';
	protected $allowedFields = ['promedio','facultad','areaEvaluacionId'];

}
