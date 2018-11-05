<?php

use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use common\models\Region;
use common\models\Tag;

?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'address')->textarea() ?>
        </div>
        <div class="col-md-6">
            <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'vk_group')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'fb_group')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'site_link')->dropDownList([0 => 'Нет', 1 => 'Да']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'regions_ids')->widget(Select2::className(), [
                        'data' => \yii\helpers\ArrayHelper::map(Region::find()->asArray()->all(), 'id', 'name'),
                        'size' => Select2::MEDIUM,
                        'options' => ['placeholder' => 'Выберите регион...', 'multiple' => true],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]) ?>

                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'activities_ids')->widget(Select2::className(), [
                        'data' => \yii\helpers\ArrayHelper::map($entityForm->getActivities(), "id", "title"),
                        'options' => ['placeholder' => 'Выберите направление деятельности...', 'multiple' => true],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $tags = Tag::find()->select(['name'])->indexBy('name')->column(); ?>
            <?= $form->field($model, 'tags')->widget(Select2::className(), [
                'data' => $tags,
                'size' => Select2::MEDIUM,
                'options' => ['placeholder' => 'Выберите тег...', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])
            ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'clients')->textarea() ?>
            <p><i><span class="badge label-warning">!</span> Перечисление через запятую</i></p>
        </div>
    </div>

    <hr/>

<?= $form->field($model, 'about')->widget(CKEditor::className(), [
    'options' => ['rows' => 6],
    'preset' => 'full'
]) ?>