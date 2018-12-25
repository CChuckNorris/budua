<?php

/* @var $this yii\web\View */

use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;

/* @var $form yii\widgets\ActiveForm */
?>


    <div class="col-md-12">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                    <i>Будет заполнено автоматически на основе Заголовка</i>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'is_announcement')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                    'onText' => 'Да',
                    'offText' => 'Нет',
                ]
            ]); ?>
        </div>
        <div class="col-md-3">
            <?=
            $form->field($model, 'status')->widget(Select2::classname(), [
                'data' => $model->getStatuses(),
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

    </div>

    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'h1_title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6">
            <?=
                $form->field($model, 'category_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\modules\blog\modules\dashboard\models\Category::find()->asArray()->all(), "id", "name"),
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $form->field($model, 'tags_ids')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\modules\blog\modules\dashboard\models\Tag::find()->asArray()->all(), "id", "name"),
                'options' => ['placeholder' => '', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full',
                'clientOptions' => [
                    'extraPlugins' => '',
                    'height' => 500,

                    //Here you give the action who will handle the image upload
                    'filebrowserUploadUrl' => \yii\helpers\Url::to(['cke-file-upload/upload']),

                    'toolbarGroups' => [
                        ['name' => 'undo'],
                        ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                        ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi' ]],
                        ['name' => 'styles'],
                        ['name' => 'links', 'groups' => ['links', 'insert']]
                    ]

                ]
            ]); ?>
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

    <!--END-->

