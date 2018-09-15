<?php

use kartik\file\FileInput;
use kartik\touchspin\TouchSpin;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\tabs\TabsX;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?php

    $items = [
        [
            'label'=>'<i class="glyphicon glyphicon-home"></i> Общая информация',
            'content' => $this->render('_common_info', ['model' => $model, 'form' => $form, 'entityForm' => $entityForm]),
            'active'=>true
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-user"></i> Настройка рейтинга',
            'content'=> $this->render('_rating_info', ['model' => $model, 'form' => $form]),
        ],

        [
            'label'=>'<i class="glyphicon glyphicon-user"></i> Медиа (лого, файлы, видео)',
            'content'=> $this->render('_media_info', ['model' => $model, 'form' => $form]),
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-user"></i> SEO настройки',
            'content'=> $this->render('_seo_info', ['model' => $model, 'form' => $form]),
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-user"></i> Дополнительная информация',
            'content'=> $this->render('_extra_info', ['model' => $model, 'form' => $form]),
        ],

    ];
    ?>

    <?php

    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_ABOVE,
        'encodeLabels'=>false
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url2 = Url::toRoute(["company/nameurl"]);
$script = <<< JS
    $('#company-name').change(function(){
       var name=$(this).val();
      $.get('$url2', {name : name}, function(data){
        var data= $.parseJSON(data);
        $('#company-alias').val(data.alias);        
       }); 
    });
JS;
$this->registerJs($script);
?>
