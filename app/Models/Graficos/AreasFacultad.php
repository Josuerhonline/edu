<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class AreasFacultad extends Model
{
	protected $table = 'view_areas_facultad';
	protected $allowedFields = ['promedio','aperCicloId','sexo'];

}
