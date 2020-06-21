<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class PromedioCarrerasModel extends Model
{
	protected $table = 'view_promedio_carrera';
	protected $allowedFields = ['nombreCorto','fecha','promedio','aperCicloId'];

}
