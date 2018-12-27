
<aside class="main-sidebar">
    <section class="sidebar">
        <?php
        $callback = function($menu){
            $data = json_decode($menu['data'], true);
            return [
                'label' => $menu['name'],
                'url'   => !empty($menu['children']) ? '#' : [$menu['route']],
                'icon'  => empty($data['icon']) ? 'fa fa-circle-o' : $data['icon'],
                'visible'   => true,
                'items' => $menu['children']
            ];
        };

        $items = mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);

        echo dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items' => $items
        ]);

        ?>
    </section>
</aside>
