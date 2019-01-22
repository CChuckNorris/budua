<?php

use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityDirection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-direction-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-6">

            <div class="row">

                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'script')->textarea() ?>
                </div>

            </div>

        </div>
    </div>

    <div style="margin-bottom: 50px"></div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= Html::submitButton('Редактировать', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
