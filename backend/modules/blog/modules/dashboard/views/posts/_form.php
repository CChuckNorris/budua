<?php

/* @var $this yii\web\View */

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?php

    $items = [
        [
            'label'=>'Общая информация',
            'content' => $this->render('_common', ['model' => $model, 'form' => $form]),
            'active'=>true
        ],
        [
            'label'=>'Медиа (лого, файлы, видео)',
            'content'=> $this->render('_media', ['model' => $model, 'form' => $form]),
        ],


    ];

?>
<div class="row">

    <?php echo TabsX::widget([
        'items' => $items,
        'position' => TabsX::POS_ABOVE,
        'encodeLabels' => false
    ]);
    ?>

    <div class="col-md-12">
        <div class="col-md-6">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
