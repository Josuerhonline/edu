          <?php
          use App\Models\Menu\MenuModel;
          use App\Models\Menu\MenuDetalleModel;
          use App\Models\Menu\RolesMenus;
          use App\Models\Menu\LimitarMenuModel;
          use App\Controllers\BaseController;
          use \CodeIgniter\Exceptions\PageNotFoundException;
          ?>
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <?php 
                $menuData        = new MenuModel();
                $menuDetalleData = new MenuDetalleModel();
                $limitarMenu     = new LimitarMenuModel();
                $rolMenu         = new RolesMenus();
                $session         = session();
                $menu = $rolMenu->asObject()->select('cof_roles_menus.*,cof_menus.*,cof_menus.menuId AS menuOrden')
                ->join('cof_menus','cof_menus.menuId = cof_roles_menus.menuId')->where('rolId',$session->rolId)->orderBy('menuOrden','asc')
                ->findAll();
                foreach ($menu as $key => $u): 
                  $menuDetalle = $menuDetalleData->asObject()->select()->where('menuId',$u->menuId)->where('estado','1')->orderBy('orden','asc')->findAll();?>

                  <li><a><i class="<?=$u->nombreIcono ?>"></i><?=$u->nombreMenu ?><span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php foreach ($menuDetalle as $key => $m):
                        $buscarMenuLimitado = $limitarMenu->asObject()->select('menuDetalleId')->where('menuDetalleId',$m->menuDetalleId)->where('rolId',$session->rolId)->first();?>
                        <?php if (!$buscarMenuLimitado): ?>
                          <li><a href=<?=$m->archivo ?>><?=$m->nombreMenuDetalle ?></a></li>
                        <?php endif ?>
                      <?php endforeach ?>
                    </ul>
                  </li>
                <?php endforeach ?>
              </li>
            </ul>
          </div>
        </div>

        <img src="/user/img/ucad_low.png" style="width: 40%;margin-left: 26%;">
        <div class="sidebar-footer hidden-small" style="height: 6%">
          <a data-toggle="tooltip"  title="Logout" href="/logout" style="width: 100%;background: #2A3F54">
          </a>
        </div>
        <link rel="stylesheet" type="text/css" href="/build/css/select2.css">
        <link rel="stylesheet" type="text/css" href="/build/css/selects.css">