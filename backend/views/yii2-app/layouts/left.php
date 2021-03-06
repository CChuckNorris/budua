<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Управление', 'options' => ['class' => 'header']],
                    ['label' => 'Компании', 'icon' => 'fa fa-list-alt', 'url' => ['/company']],
                    #['label' => 'Персоны', 'icon' => 'fa fa-users', 'url' => ['/person']],
                    ['label' => 'Регионы', 'icon' => 'fa fa-list-alt', 'url' => ['/region']],
                   # ['label' => 'Теги', 'icon' => 'fa fa-tags', 'url' => ['/tag']],
                    ['label' => 'Направление деятельности', 'icon' => 'fa fa-tags', 'url' => ['/activity-directions']],
                    ['label' => 'Настройки + СЕО', 'icon' => 'fa fa-tags', 'url' => ['/theme/view']],
                    ['label' => 'Настройки виджетов', 'icon' => 'fa fa-tags', 'url' => ['/widgets-settings']],
                    ['label' => 'Отзывы', 'icon' => 'fa fa-tags', 'url' => ['/review']],
                    ['label' => 'Страницы', 'icon' => 'fa fa-tags', 'url' => ['/pages']],
                    [
                        'label' => 'Блог',
                        'icon' => 'fa fa-tags',
                        'url' => ['#'],
                        'items' => [

                                ["label" => "Статьи", "url" => "/yii-admin/blog/dashboard/posts"],
                                ["label" => "Теги", "url" => "/yii-admin/blog/dashboard/tags"],
                                ["label" => "Категории", "url" => "/yii-admin/blog/dashboard/categories"]
                        ]
                    ],

                ],
            ]
        ) ?>

    </section>

</aside>
