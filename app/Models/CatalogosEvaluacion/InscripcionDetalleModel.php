<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class InscripcionDetalleModel extends Model
{
    protected $table = 'eva_inscripcion_detalle';
    protected $primaryKey = 'inscripcionDetalleId';
    protected $allowedFields = ['inscripcionId','planMateriaId','estado'];

}
