<?php

use yii\data\ArrayDataProvider;
use yii\widgets\ListView;
?>

<?php \yii\widgets\Pjax::begin(['enableReplaceState' => false, 'enablePushState' => false, 'timeout' => 5000 ]); ?>
<?php
$dataProvider = new ArrayDataProvider([
    'allModels' => $items,
    'pagination' => [
        'pageSize' => $widget->pageSize,
    ],
]);
?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '',
    'itemView' => '_content',
    'viewParams' => [
        'widget' => $widget
    ],

    'options' => [
        'tag' => 'div',
        'class' => 'testimonials-list-vertical md-top-offset align-left md-align-center',
        'id' => 'list-wrapper',
    ],

]) ?>
<?php \yii\widgets\Pjax::end(); ?>

