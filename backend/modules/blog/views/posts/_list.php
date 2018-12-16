<?php

use yii\widgets\ListView;

?>

<?php
\yii\widgets\Pjax::begin(['enableReplaceState' => false, 'enablePushState' => false, 'timeout' => 5000]);
?>
<?=

    ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'itemView' => '_content',
        'viewParams' => [
        ],
        'options' => [
            'tag' => 'ul',
            'class' => 'blog',
            'id' => 'list-wrapper',
        ],
        'itemOptions' => [
            'tag' => false,
        ],

    ]) ?>

<?php \yii\widgets\Pjax::end(); ?>
