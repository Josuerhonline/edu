<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class CountEvaluacionesDocenteModel extends Model
{
	protected $table = 'view_count_evaluaciones_docentes';
	protected $allowedFields = ['fecha','cantidad'];

}
