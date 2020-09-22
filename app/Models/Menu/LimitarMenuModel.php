<?php namespace App\Models\Menu;

use CodeIgniter\Model;

class LimitarMenuModel extends Model
{
    protected $table = 'cof_limitar_menus';
    protected $primaryKey = 'limitarMenuId';
    protected $allowedFields = ['limitarMenuId','rolId','menuDetalleId','rolMenuId'];

}
