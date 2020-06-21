<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class CountEvaluacionesModel extends Model
{
	protected $table = 'view_count_evaluaciones';
	protected $allowedFields = ['fecha','cantidad'];

}
