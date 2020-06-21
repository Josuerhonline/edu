<?php namespace App\Models\EvaluacionDocente;

use CodeIgniter\Model;

class CargaViewModel extends Model
{
	protected $table = 'view_carga_academica';
	protected $primaryKey = 'cargaAcademicaId';
	protected $allowedFields = ['nombres','apellidos','carnet','nombrePlan','nombre','nombrePersonalizado','usuario','rolId'];


}

