<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="col-md-12">

    <div class="col-md-12">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                    <i>Будет заполнено автоматически на основе Заголовка</i>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'seo_keys')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'seo_description')->textarea(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

