<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class PromedioFacultadGeneroModel extends Model
{
	protected $table = 'view_promedio_facultad_genero';
	protected $allowedFields = ['promedio','facultad','areaEvaluacionId'];

}
