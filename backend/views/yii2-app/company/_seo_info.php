<?php

use yii\helpers\Html;

?>
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'seo_keys')->textInput(['maxlength' => true]) ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'seo_desc')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
</div>



