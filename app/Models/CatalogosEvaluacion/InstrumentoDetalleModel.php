<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class InstrumentoDetalleModel extends Model
{
    protected $table = 'eva_instrumento_detalle';
    protected $primaryKey = 'instrumentoDetalleId';
    protected $allowedFields = ['instrumentoDetalleId','instrumentoId','preguntaId','orden'];

}
