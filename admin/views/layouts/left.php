<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset->baseUrl ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <?php
        $callback = function($menu){
            $data = json_decode($menu['data'], true);
            return [
                'label' => $menu['name'],
                'url'   => !empty($menu['children']) ? '#' : [$menu['route']],
                'icon'  => empty($data['icon']) ? 'circle-o' : $data['icon'],
                'visible'   => true,
                'items' => $menu['children']
            ];
        };

        $items = mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);

        echo dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
            'items' => $items
        ]);

        ?>
    </section>
</aside>
