<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class PlanMateriaModel extends Model
{
    protected $table = 'cof_plan_materia';
    protected $primaryKey = 'planMateriaId';
    protected $allowedFields = ['planId','materiaId'];

}
