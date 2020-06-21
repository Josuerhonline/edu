<?php namespace App\Models\EvaluacionDocente;

use CodeIgniter\Model;

class EvaluacionDocenteViewModel extends Model
{
    protected $table = 'view_evaluacion';
    protected $primaryKey = 'planId';
    protected $allowedFields = ['nombres','apellidos','nombrePlan','materia','instrumentoId','nombrePersonalizado','fechaEvaluacion'];

}
