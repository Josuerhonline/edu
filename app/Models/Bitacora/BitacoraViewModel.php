<?php namespace App\Models\Bitacora;

use CodeIgniter\Model;

class BitacoraViewModel extends Model
{
	protected $table = 'view_bitacora';
	protected $allowedFields = ['usuario','fecha','hora','actividad','horaEntrada','horaSalida','fechaEntrada','fechaSalida','nombreHost','ip'];

}
