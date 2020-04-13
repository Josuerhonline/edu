<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class MateriasModel extends Model
{
    protected $table = 'cof_materias';
    protected $primaryKey = 'materiaId';
    protected $allowedFields = ['nombre','codMateria','nombreCorto','estado'];

}
