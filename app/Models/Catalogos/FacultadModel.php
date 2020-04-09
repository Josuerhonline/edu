<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class FacultadModel extends Model
{
    protected $table = 'cof_facultad';
    protected $primaryKey = 'facultadId';
    protected $allowedFields = ['facultadId','universidadId','facultad'];

}
