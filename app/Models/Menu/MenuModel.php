<?php namespace App\Models\Menu;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'cof_menus';
    protected $primaryKey = 'menuId';
    protected $allowedFields = ['menuId','nombreMenu','nombreIcono','estado'];

}
