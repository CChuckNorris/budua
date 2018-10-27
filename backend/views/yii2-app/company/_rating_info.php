<?php
use kartik\touchspin\TouchSpin;
use kartik\select2\Select2;
?>
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-3">
                <?=
                $form->field($model, 'raiting')->widget(TouchSpin::classname(), [
                    'options'=>['placeholder'=>'Введите рейтинг'],
                    'pluginOptions' => [
                        'verticalbuttons' => true,
                        'verticalupclass' => 'glyphicon glyphicon-plus',
                        'verticaldownclass' => 'glyphicon glyphicon-minus',
                        'max' => 99999,
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-3">
                <?=
                $form->field($model, 'mod_rating')->textInput(['maxlength' => true, "disabled" => true])
                ?>
            </div>

            <div class="col-md-2">
                <?= $form->field($model, 'multiplier')->widget(TouchSpin::classname(), [
                    'options'=>['placeholder'=>'Введите мультипликатор'],
                    'pluginOptions' => [
                        'initval' => 1.00,
                        'decimals' => 2,
                        'step' => 0.1,
                        'verticalbuttons' => true,
                        'verticalupclass' => 'glyphicon glyphicon-plus',
                        'verticaldownclass' => 'glyphicon glyphicon-minus',
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <p><i><span class="badge label-warning">?</span><code>Модифицированный рейтинг</code>будет отображаться на сайте как значение рейтинга Компании и рассчитывается по формуле</i><code>Базовый рейтинг</code>*<code>Наполенность профиля</code>*<code>Мультипликатор</code></p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php

            // Normal select with ActiveForm & model
            echo $form->field($model, 'rating_status')->widget(Select2::classname(), [
                'data' => \common\helpers\CompanyStatuses::getStatuses(),
                'options' => ['placeholder' => 'Репутация...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

    </div>
</div>