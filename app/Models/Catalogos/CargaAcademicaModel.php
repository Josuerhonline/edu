<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class CargaAcademicaModel extends Model
{
    protected $table = 'cof_carga_academica';
    protected $primaryKey = 'cargaAcademicaId';
    protected $allowedFields = ['personaId','planMateriaId','aperCicloId','estadoCarga'];


}

