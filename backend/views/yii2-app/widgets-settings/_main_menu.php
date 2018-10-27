<?php

use yii\helpers\Url;
use kartik\color\ColorInput;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityDirection */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

$targets = [
    "_blank" => "blank",
    "_self" => "self"
];
?>

<div class="activity-direction-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'link_href1')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_name1')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_target1')->dropDownList($targets) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_title1')->textInput() ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'link_href2')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_name2')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_target2')->dropDownList($targets) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_title2')->textInput() ?>
        </div>

    </div>
    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'link_href3')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_name3')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_target3')->dropDownList($targets) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_title3')->textInput() ?>
        </div>

    </div>
    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'link_href4')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_name4')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_target4')->dropDownList($targets) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'link_title4')->textInput() ?>
        </div>

    </div>


    <div class="form-group">
        <?= Html::submitButton('Редактировать', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

