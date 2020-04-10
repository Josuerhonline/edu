<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class CarrerasModel extends Model
{
    protected $table = 'cof_carreras';
    protected $primaryKey = 'carreraId';
    protected $allowedFields = ['carreraId','facultadId','nombre','nombreCorto','estado'];

}
