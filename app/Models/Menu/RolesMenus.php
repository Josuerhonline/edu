<?php namespace App\Models\Menu;

use CodeIgniter\Model;

class RolesMenus extends Model
{
    protected $table = 'cof_roles_menus';
    protected $primaryKey = 'rolMenuId';
    protected $allowedFields = ['rolId','menuId'];

}
