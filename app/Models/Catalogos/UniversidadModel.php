<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class UniversidadModel extends Model
{
    protected $table = 'cof_universidad';
    protected $primaryKey = 'universidadId';
    protected $allowedFields = ['universidadId','universidad','direccion','telefono'];

}
