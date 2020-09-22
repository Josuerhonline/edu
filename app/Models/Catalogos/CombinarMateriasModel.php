<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class CombinarMateriasModel extends Model
{
    protected $table = 'cof_combinar_materias';
    protected $primaryKey = 'combinarMateriaId';
    protected $allowedFields = ['personaId','fechaCreacion','nombreCombinacion'];

}
