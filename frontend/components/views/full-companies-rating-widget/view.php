<?php

use yii\data\ArrayDataProvider;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

\yii\widgets\Pjax::begin(['enableReplaceState' => false, 'timeout' => 5000]);

$dataProvider = new ArrayDataProvider([
    'allModels' => $items,
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
    <div class="table-responsive">
        <div class="table-header">
            <div class="col-md-12 columns">
                <div class="col-md-6">Застройщик</div>
                <div class="col-md-6">Рейтинг</div>
                <div class="col-md-6">Отзывы</div>
            </div>
        </div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}{pager}',
            'itemView' => '_content',
            'viewParams' => [
                'widget' => $widget
            ],
            'options' => [
                'tag' => 'ul',
                'class' => 'companies-rating-list-wiget table td-width sm-table-layout-auto md-change-size',
                'id' => 'list-wrapper',
            ],
            'itemOptions' => [
                'tag' => false,
            ],

        ]) ?>
    </div>

<?php \yii\widgets\Pjax::end(); ?>