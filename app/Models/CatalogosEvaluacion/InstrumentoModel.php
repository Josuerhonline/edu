<?php namespace App\Models\CatalogosEvaluacion;

use CodeIgniter\Model;

class InstrumentoModel extends Model
{
    protected $table = 'eva_instrumento';
    protected $primaryKey = 'instrumentoId';
    protected $allowedFields = ['areaEvaluacionId','nombreInstrumento','descripcion','estadoInstrumento'];

}
