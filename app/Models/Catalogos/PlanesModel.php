<?php namespace App\Models\Catalogos;

use CodeIgniter\Model;

class PlanesModel extends Model
{
    protected $table = 'cof_planes';
    protected $primaryKey = 'planId';
    protected $allowedFields = ['planId','carreraId','nombrePlan','plaAcuerdo','estado'];

}
