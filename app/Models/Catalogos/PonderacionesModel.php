<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class PonderacionesModel extends Model
{
    protected $table = 'cof_ponderaciones';
    protected $primaryKey = 'ponderacionId';
    protected $allowedFields = ['ponderacionMinima','ponderacionMaxima','estadoPonderacion'];

}
