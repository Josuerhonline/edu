<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class MateriasModel extends Model
{
    protected $table = 'cof_materias';
    protected $primaryKey = 'materiaId';
    protected $allowedFields = ['materiaId','nombre','codMateria','nombreCorto','estado'];

}
