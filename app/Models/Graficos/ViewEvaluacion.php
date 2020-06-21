<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class ViewEvaluacion extends Model
{
	protected $table = 'view_evaluacion';
	protected $allowedFields = ['valor','aperCicloId','preguntaId'];

}
