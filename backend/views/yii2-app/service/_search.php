<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ServiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'site') ?>

    <?= $form->field($model, 'site_link') ?>

    <?php // echo $form->field($model, 'raiting') ?>

    <?php // echo $form->field($model, 'reviews') ?>

    <?php // echo $form->field($model, 'vk_group') ?>

    <?php // echo $form->field($model, 'fb_group') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'about') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'seo_title') ?>

    <?php // echo $form->field($model, 'seo_keys') ?>

    <?php // echo $form->field($model, 'seo_desc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
