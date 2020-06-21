<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class CarreraFechaModel extends Model
{
	protected $table = 'view_carrera_fecha';
	protected $allowedFields = ['nombreFecha','aperCicloId'];

}
