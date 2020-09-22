<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class CombinarMateriasDetalleModel extends Model
{
    protected $table = 'cof_combinar_materias_detalle';
    protected $primaryKey = 'combinarMateriaDetaId';
    protected $allowedFields = ['combinarMateriaId','planMateriaId'];

}
