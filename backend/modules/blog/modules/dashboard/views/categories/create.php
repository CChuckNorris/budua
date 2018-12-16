<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = 'Добавить Категорию';
$this->params['breadcrumbs'][] = ['label' => 'Теги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
