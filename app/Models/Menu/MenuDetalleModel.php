<?php namespace App\Models\Menu;

use CodeIgniter\Model;

class MenuDetalleModel extends Model
{
    protected $table = 'cof_menus_detalle';
    protected $primaryKey = 'menuDetalleId';
    protected $allowedFields = ['menuDetalleId','menuId','nombreMenuDetalle','orden','archivo','estado'];

}
