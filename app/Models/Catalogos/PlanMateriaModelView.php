<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class PlanMateriaModelView extends Model
{
    protected $table = 'view_planmateria';
    protected $primaryKey = 'planMateriaId';
    protected $allowedFields = ['planMateriaId','nombre','nombrePlan'];

}
