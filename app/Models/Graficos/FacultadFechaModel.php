<?php namespace App\Models\Graficos;

use CodeIgniter\Model;

class FacultadFechaModel extends Model
{
	protected $table = 'view_facultad_fecha';
	protected $allowedFields = ['nombreFechaFacultad','aperCicloId','promedio'];

}
