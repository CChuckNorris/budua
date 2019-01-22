<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
        'action' => ['reviews/add-review'],
        'method' => 'POST',
        'id' => 'addReview',
        'options' => ['class' => 'form validate-form add-review top-offset', 'data-pjax' => false]
]); ?>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <div class="title">Добавить комментарий:</div>
            <?= \yii\helpers\Html::textarea("text", '', ["id" => "text", "class" => "textarea", "placeholder" => "Напишите здесь Ваш комментарий..."]) ?>

            <div class="text-error">Необходимо заполнить «Текст комментария».</div>
        </div>
    </div>
    <div class="col-xs-12 col-md-5 col-md-offset-1 ">
        <div class="form-group offset-top inline-blocks">
            <div class="title rating-title">Ваша оценка:</div>
            <?= \yii\helpers\Html::hiddenInput("stars", '3', ["id" => "ratingResult"]) ?>

            <?= \yii\helpers\Html::hiddenInput("post_id", $widget->getPostID(), ["id" => "ratingResult"]) ?>

            <ul class="rating-edited edited" data-onchange="ratingChange" data-value="3">
                <li></li>
                <li></li>
                <li class="active"></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Добавить', ['name' => 'add-button', 'class' => 'btn top-offset', 'id'=>"reviewSubmitButton"]) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


<!--<script>

    // this is the id of the form
    $("#addReview").submit(function (e) {

        var content = $("text");
        if (!content.val()) {
            $(".text-error").show();
            return false;
        }

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data) {
                if (data["status"] !== false) {
                    $(".reviews").html(data)

                }
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>-->