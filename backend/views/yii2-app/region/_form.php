<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Region */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">

                    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'h1_title')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'seo_title')->textInput() ?>

        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'seo_key')->textInput() ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'seo_desc')->textarea() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'about')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url2 = Url::toRoute(["/slug-translator/get-slug"]);
?>
<script>

    $('#region-name').change(function () {
        var name = $(this).val();
        $.get("<?= $url2 ?>", {slug: name}, function (data) {
            data = $.parseJSON(data);
            $('#region-alias').attr("value", data.alias);
        });
    });
</script>