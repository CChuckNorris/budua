<?php

use kartik\file\FileInput;
?>

<div class="row">
    <div class="col-md-6">
        <?=
        $form->field($model, 'logo')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
        ]);
        ?>
    </div>
    <div class="col-md-6 text-center">
        <div class="form-group" style="margin-top: 20px">
            <?php if ($model->logo): ?>
                <img src="<?= Yii::$app->params['imgPath'] . $model->logo ?>" class="img-rounded" width="200"
                     alt='logo'/>
            <?php endif; ?>
        </div>
    </div>
</div>

<hr/>
<div class="row">
    <div class="col-md-12">
        <?=
        $form->field($model, 'cases[]')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true
            ],
        ]);
        ?>
    </div>
    <div class="col-md-12">
        <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $model->casesFiles, "id" => "carousel1", "carousel" => "bootstrap"]) ?>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">

        <?=
        $form->field($model, 'reviews_and_thanks[]')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true
            ],
        ]);
        ?>
    </div>
    <div class="col-md-12">
        <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $model->reviewsAndThanksFiles, "id" => "carousel2",  "carousel" => "bootstrap"]) ?>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'videos')->textArea(['rows' => 4]) ?>
        <i> Укажите ID видео или несколько ID через <code>`,`</code></i>
    </div>
</div>
